<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Member\InfoPersonal;
use App\Models\Member\InfoAcademic;
use App\Models\Member\InfoCompany;
use App\Models\Member\InfoStudent;
use App\Models\Member\InfoDocument;
use App\Models\Member\InfoOther;
use App\Models\Master\MastQualification;
use App\Models\Master\MemberType;
use App\Models\Payment\PaymentDetails;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\Helper;
use App\Mail\MemberApproved;
use Illuminate\Support\Facades\Mail;
use ZipArchive;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = User::where('member_type_id', $id)->where('status', 1)->orderBy('member_code', 'asc')->get();
        $memberType = MemberType::where('id', $id)->first()->name;
        return view('layouts.pages.member.index',compact('data', 'memberType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $memberType = MemberType::where('is_delete', 0)->where('status', 1)->get();
        $qualification = MastQualification::where('is_delete', 0)->where('status', 1)->get();
        return view('frontend.pages.register_form', compact('memberType','qualification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            //----Validation Check 
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users,email|max:255',
                'password' => 'required|confirmed|min:8',
                'member_type_id' => 'required',
                'contact_number' => 'required',
                'profile_photo_path' => 'required|mimes:jpg,png,jpeg,gif,svg|image',
                'institute' => 'required',
                'mast_qualification_id' => 'required',

                'trade_licence' => 'max:10240',
                'tin_certificate' => 'max:10240',
                'nid_photo_copy' => 'max:10240',
                'passport_photo' => 'max:10240',
                'edu_certificate' => 'required|max:10240',
                'experience_certificate' => 'max:10240',
                'stu_id_copy' => 'max:10240',
                'recoment_letter' => 'max:10240',

                'company_name' => 'required_if:member_type_id,1,2,3,4',
                'designation' => 'required_if:member_type_id,1,2,3,4',
                'student_institute' => 'required_if:member_type_id,5',
            ], [
                'profile_photo_path.required' => 'The Profile photo field is required.',
                'profile_photo_path.mimes' => 'The :attribute must be a valid image file.',
                'contact_number.required' => 'The Contact Number field is required.',
                'mast_qualification_id.required' => 'The Qualification field is required.',
                'trade_licence.max' => 'Trade licence must not be greater than 10MB.',
                'tin_certificate.max' => 'Tin certificate must not be greater than 10MB.',
                'nid_photo_copy.max' => 'NID photo must not be greater than 10MB.',
                'passport_photo.max' => 'Passport photo must not be greater than 10MB.',
                'edu_certificate.required' => 'The EDU. Certificate field is required.',
                'edu_certificate.max' => 'EDU. certificate must not be greater than 10MB.',
                'experience_certificate.max' => 'Experience certificate must not be greater than 10MB.',
                'stu_id_copy.max' => 'STU. id must not be greater than 10MB.',
                'recoment_letter.max' => 'Recoment letter must not be greater than 10MB.',
                
                'company_name.required_if' => 'The company name field is required',
                'designation.required_if' => 'The designation field is required',
                'student_institute.required_if' => 'The student institute field is required',
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            


            /*__________________/ USER CREATE \_________________*/
            if($request->hasFile('profile_photo_path')) {
                //get filename with extension
                $filenamewithextension = $request->file('profile_photo_path')->getClientOriginalName();
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('profile_photo_path')->getClientOriginalExtension();
                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;
        
                //Upload File
                $request->file('profile_photo_path')->move('public/images/profile/', $filenametostore); //--Upload Location
                // $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
        
                //Resize image here
                $thumbnailpath = public_path('images/profile/'.$filenametostore); //--Get File Location
                // $thumbnailpath = public_path('storage/images/profile/'.$filenametostore);
                
                $data = Image::make($thumbnailpath)->resize(1200, 850, function($constraint) {
                    $constraint->aspectRatio();
                }); 
                $data->save($thumbnailpath);


                /*_____________________ MEMBER ID GENERATE ___________________*/
                $currentYear = date('y'); // Get last two digits of the year (25 for 2025)
                $currentMonth = date('m'); // Get the month (03 for March)

                // Retrieve prefix safely
                $memberType = MemberType::find($request->member_type_id);
                $prefix = $memberType ? $memberType->prefix : 'NEW';

                // Find the highest existing member code
                $highestNumber = User::where('member_code', 'like', "$prefix$currentYear$currentMonth%")->max('member_code');

                // Extract last number safely
                $lastNumber = $highestNumber ? intval(substr($highestNumber, -2)) : 0;
                $newNumber = $lastNumber + 1;
                $formattedNewNumber = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

                // Generate Member Code (S2503004)
                $memberCode = ($prefix == '-') ? "NEW" : "$prefix$currentYear$currentMonth$formattedNewNumber";
                
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'member_code' => $memberCode,
                    'profile_photo_path' => $filenametostore,
                    'member_type_id' => $request->member_type_id,
                    'email_verified_at' => now(),
                    'status' => 0,
                    'is_admin' => 0,
                ]);
            }


            /*__________________/ InfoPersonal \_________________*/
            $infoPersonal =new InfoPersonal([
                'contact_number'=> $request->contact_number,
                'nid_no'=> $request->nid_no,
                'dob'=> $request->dob,
                'father_name'=> $request->father_name,
                'mother_name'=> $request->mother_name,
                'present_address'=> $request->present_address,
                'parmanent_address'=> $request->parmanent_address,
                'gender'=> $request->gender,
                'blood_group'=> $request->blood_group,
                'marrital_status'=> $request->marrital_status,
                'spouse'=> $request->spouse,
                'spouse_dob'=> $request->spouse_dob,
                'number_child'=> $request->number_child,
                'em_name'=> $request->em_name,
                'em_phone'=> $request->em_phone,
                'em_rleation'=> $request->em_rleation,
                'status'=> 1,
                'member_id'=> $user->id,
            ]);
            $infoPersonal->save();
            
            /*______________________/ InfoAcademic \___________________*/
            $infoAcademic =new InfoAcademic([
                'institute' => $request->institute,
                'mast_qualification_id' => $request->mast_qualification_id,
                'subject' => $request->subject,
                'passing_year' => $request->passing_year,
                'other_qualification' => $request->other_qualification,
                'status' => 1,
                'member_id' => $user->id,
            ]);
            $infoAcademic->save();
            
            /*______________________/ InfoCompany \___________________*/
            if($request->company_name || $request->designation || $request->company_email || $request->company_phone){
                $infoCompany =new InfoCompany([
                    'company_name' => $request->company_name,
                    'company_email' => $request->company_email,
                    'company_phone' => $request->company_phone,
                    'designation' => $request->designation,
                    'address' => $request->address,
                    'web_url' => $request->web_url,
                    'is_job' => 1,
                    'is_business' => 0,
                    'status' => 1,
                    'member_id' => $user->id,
                ]);
                $infoCompany->save();
            }
            /*______________________/ InfoStudent \___________________*/
            if ($request->student_institute || $request->semester || $request->head_faculty_name || $request->head_faculty_number) {
                $infoStudent =new InfoStudent([
                    'student_institute' => $request->student_institute,
                    'semester' => $request->semester,
                    'head_faculty_name' => $request->head_faculty_name,
                    'head_faculty_number' => $request->head_faculty_number,
                    'status' => 1,
                    'member_id' => $user->id,
                ]);
                $infoStudent->save(); 
            }
            /*______________________/ InfoOther \___________________*/
            $infoOther = new InfoOther([
                'status' => 1,
                'member_id' => $user->id,
            ]);
            $infoOther->save();
            /*______________________/ InfoDocument \___________________*/
            $userId = $user->id;
            function uploadFile($request, $fieldName, $subfolder, $userId) {
                if ($request->hasFile($fieldName)) {
                    $uploadedFile = $request->file($fieldName);
                    $extension = $uploadedFile->getClientOriginalExtension();
                    $filenameToStore = strtoupper($fieldName) . '_' . time() . '.' . $extension;

                    $folderPath = public_path("document/member/{$userId}/{$subfolder}");
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, 0777, true);
                    }

                    $uploadedFile->move($folderPath, $filenameToStore);

                    return "document/member/{$userId}/{$subfolder}/{$filenameToStore}";
                }
                
                return null;
            }
            $infoDocument = new InfoDocument([
                'trade_licence' => uploadFile($request, 'trade_licence', 'trade', $userId),
                'tin_certificate' => uploadFile($request, 'tin_certificate', 'tin', $userId),
                'nid_photo_copy' => uploadFile($request, 'nid_photo_copy', 'nid', $userId),
                'passport_photo' => uploadFile($request, 'passport_photo', 'passport', $userId),
                'edu_certificate' => uploadFile($request, 'edu_certificate', 'edu', $userId),
                'experience_certificate' => uploadFile($request, 'experience_certificate', 'experience', $userId),
                'stu_id_copy' => uploadFile($request, 'stu_id_copy', 'stu', $userId),
                'recoment_letter' => uploadFile($request, 'recoment_letter', 'recoment', $userId),
                'status' => 1,
                'member_id' => $userId,
            ]);
            $infoDocument->save();

            // Log in the created user
            Auth::login($user);
            // Send email verification
            // $user->sendEmailVerificationNotification();
            
            // Commit the transaction if everything is successful
            DB::commit();

            // Return message
            return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error: ' . $e->getMessage());
            // Depending on the type of exception, handle accordingly
            if ($e instanceof PostTooLargeException) {
                return response()->json([
                    'error' => 'File size exceeds the limit',
                    'message' => 'The uploaded file size exceeds the allowed limit.',
                ], 422);
            } else {
                // Handle other types of exceptions here
                return response()->json([
                    'error' => 'Internal Server Error',
                    'message' => 'An unexpected error occurred. Please try again later.',
                ], 500);
            }
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
    /*__________________________________________________________________________________ */
    /*__________________________________________________________________________________ */
    public function approveIndex(){
        $data = User::where('is_admin', 1)->where('status', 0)->get();

        $record = User::where('is_admin', 1)->whereIn('status', [1,2])->get();
        return view('layouts.pages.member.approve', compact('data','record'));
    }
    public function approveUpdate($id){
        $user = User::findorfail($id);
        $user->status = 1;
        $user->approve_by = Auth::user()->id;
        $user->save();
        $user->assignRole('Member');
        
        // $mailData =[
        //     'title' => 'Now Your Are Member Of IDAB',
        //     'body' => 'This Is body',
        // ];
        // Mail::to($user->email)->send(new MemberApproved($mailData));
        $notification=array('messege'=>'Approve successfully!','alert-type'=>'success');
        
        return redirect()->back()->with($notification);
    }
    public function approveCancel($id){
        $approve = User::findorfail($id);
        $approve->status = 2;
        $approve->approve_by = Auth::user()->id;
        $approve->save();
        $notification=array('messege'=>'Cancel approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function approvePadding()
    {
        return view('waiting');
    }
    /**___________________________________________________________________________________
     * DOWNLOAD CERTIFICATE
     * ___________________________________________________________________________________
     */

    public function certificateDownload(User $user)
    {
        // Optional security
        // if (auth()->id() !== $user->id) abort(403);

        $data = [
            'user' => $user,
            'certificate_no' => 'CERT-' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
            'issue_date' => now()->format('d M Y'),
        ];

        $pdf = Pdf::loadView('layouts.pages.member.certificate-download', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download('certificate_' . $user->id . '.pdf');
    }

    /**___________________________________________________________________________________
     * DOWNLOAD CSV Member List
     * ___________________________________________________________________________________
     */
    public function downloadMemberListCSV()
    {
        $users = User::where('users.status', true)
            ->whereNotIn('users.id', [1, 2])
            ->leftJoin('info_personals', 'users.id', '=', 'info_personals.member_id')
            ->leftJoin('info_companies', 'users.id', '=', 'info_companies.member_id')
            ->leftJoin('member_types', 'users.member_type_id', '=', 'member_types.id')
            ->leftJoin('payment_details', function($join) {
                $join->on('users.id', '=', 'payment_details.member_id')
                    ->where('payment_details.payment_reason_id', 1)
                    ->whereRaw('payment_details.created_at = (
                        SELECT MAX(pd.created_at) 
                        FROM payment_details pd 
                        WHERE pd.member_id = users.id 
                        AND pd.payment_reason_id = 1
                    )');
            })
            ->select(
                'users.*',
                'info_personals.contact_number',
                'info_companies.address',
                'member_types.name as member_type_name',
                'payment_details.payment_date',
                'payment_details.paid_amount'
            )
            ->orderBy('users.name', 'asc')
            ->get();
    
        // Filter duplicates by name, keep latest payment_date
        $uniqueUsers = $users->groupBy('name')->map(function($group) {
            return $group->sortByDesc('payment_date')->first();
        })->values();
    
        $filename = "members_" . now()->format('Ymd_His') . ".csv";
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];
    
        $columns = [
            'Serial No',
            'Membership No',
            'Name',
            'Email Id',
            'Mobile No',
            'Office Address',
            'Last Payment Date',
            'Last Payment Amount',
            'Member Type',
            'Remarks'
        ];
    
        $callback = function () use ($uniqueUsers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
    
            $serial = 1;
            foreach ($uniqueUsers as $user) {
                fputcsv($file, [
                    $serial++,
                    $user->member_code ?? '',
                    $user->name ?? '',
                    $user->email ?? '',
                    $user->contact_number ?? '',
                    $user->address ?? '',
                    $user->payment_date ? date('Y-m-d', strtotime($user->payment_date)) : '',
                    $user->paid_amount ?? '',
                    $user->member_type_name ?? '',
                    $user->remarks ?? '',
                ]);
            }
    
            fclose($file);
        };
    
        return response()->stream($callback, 200, $headers);
    }


    
    /**___________________________________________________________________________________
     * DOWNLOAD DOCUMENT
     * ___________________________________________________________________________________
     */

    function downloadZipFile($userId) {
        // Define the path where the user's documents are stored
        $documentPath = public_path("document/member/{$userId}");

        // Check if the folder exists
        if (File::exists($documentPath)) {
            // Create a unique zip file name
            $zipFileName = "user_documents_{$userId}.zip";

            // Initialize a new ZipArchive
            $zip = new ZipArchive();

            // Open the zip file for writing
            if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
                // Add all files in the user's document folder to the zip archive
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($documentPath));
                foreach ($files as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($documentPath) + 1);
                        $zip->addFile($filePath, $relativePath);
                    }
                }

                // Close the zip file
                $zip->close();

                // Set headers to force the download of the zip file
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
                header('Content-Length: ' . filesize($zipFileName));

                // Output the zip file
                readfile($zipFileName);

                // Delete the zip file after download (optional)
                unlink($zipFileName);

                exit;
            }
        }

        // Handle the case where no documents were found for the user
        return "No documents found for user {$userId}";
    }

    /*--------------------------------------------------------------------------------
    --------------------------------  SINGLE   ---------------------------------------
    --------------------------------------------------------------------------------*/

    public function downloadTradeLicence($id)
    {
        
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->trade_licence);
            // dd($filePath);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    public function downloadTinCertificate($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->tin_certificate);
            
            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    public function downloadNidPhotoCopy($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->nid_photo_copy);
            
            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    public function downloadPassportPhoto($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->passport_photo);
            
            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    public function downloadEduCertificate($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->edu_certificate);
            
            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    public function downloadExperienceCertificate($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->experience_certificate);
            
            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    public function downloadStuIdCopy($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->stu_id_copy);
            
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }

    public function downloadRecomentLetter($id)
    {
        try {
            $data = InfoDocument::findOrFail($id);
            $filePath = public_path($data->recoment_letter);
            
            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }


    public function findMember(Request $request)
    {
        $request->validate([
            'member_code' => 'required|string'
        ]);

        $member = User::where('member_code', $request->member_code)->first();

        if ($member) {
            return response()->json([
                'success' => true,
                'id' => $member->id,
                'member_code' => $member->member_code,
                'name' => $member->name,
                'email' => $member->email,
                'member_type' => $member->memberType->name,
                'join_date' => $member->created_at,
                'profile_photo_path' => $member->profile_photo_path,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Member not found!"
            ]);
        }
    }
    
}
