<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Event;
use App\Models\Master\MemberType;
use App\Models\Payment\EventRegister;
use App\Models\Payment\PaymentReasons;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\Transaction;
use App\Models\Payment\PaymentDetails;
use App\Models\Payment\PaymentNumber;
use App\Models\Payment\Cards;
use App\Models\User;
use App\Mail\MemberApproved;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function createRegistation()
    {
        return view('frontend.pages.register_payment');
    }
    public function createEventRegistation($id)
    {
        $data =Event::findOrFail($id);
        return view('frontend.pages.events_register', compact('data'));
    }
    public function createAnnualFees()
    {
        return view('layouts.pages.transaction.annual-fees-create');
    }
    /**____________________________________________________________________________________________
     * STORE => REGISTATION
     * ____________________________________________________________________________________________
     */
    public function storeRegistation(Request $request)
    {
        try{
            if($request->payment_method_id == 2){
                $validated=$request -> validate([
                    'payment_number'=> 'required',
                    'slip' => 'max:2048|nullable|mimes:pdf,jpeg,png,gif,doc,docx',
                ]);
            }else{
                $validated=$request -> validate([
                    'payment_number'=> 'required',
                    'transaction_number'=> 'required',
                    'transfer_number'=> 'required',
                ]);
            }
    
            $eventCheck = EventRegister::where('event_id', $request->ref_reason_id)->where('member_id', Auth::user()->id)->first();
            if ($eventCheck) {
                return redirect()->back()->with('success', 'You have already registered for this event.');
            }
    
            $update = User::findorfail(Auth::user()->id);
            $update->is_admin = 1;
            $update->save();
            
            $transaction = new Transaction();
            $transaction->amount = $request->amount;
            $transaction->transaction_type = 1; // 'Deposit => 1', 'Withdraw => 2', 'Purchase => 3'
            $transaction->transaction_id = null; // Payment gateway's transaction ID
            $transaction->status = 0;
            $transaction->payment_method_id = $request->payment_method_id;
            $transaction->user_id = Auth::user()->id;
            $transaction->save();
    
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
            $paymentDetails = new PaymentDetails();
            $paymentDetails->payment_date = now()->format('Y-m-d');
            $paymentDetails->paid_amount = $request->amount;
            $paymentDetails->payment_number = $request->payment_number; // (bKash number, Rocket number, Card last 4 digits)
            $paymentDetails->transaction_number = $request->transaction_number; // (payment gateway's transaction number)
            $paymentDetails->transaction_id = $transaction->id;
            $paymentDetails->payment_reason_id = $request->payment_reason_id; // Register => 1, Event => 2, Annual Fees =>3
            $paymentDetails->ref_reason_id = $request->ref_reason_id; // Register->null, Event->id
            $paymentDetails->transfer_number = $request->transfer_number;
            $paymentDetails->slip = uploadFile($request, 'slip', 'bank-info', Auth::user()->id);
            $paymentDetails->message = $request->message;
            $paymentDetails->payment_method_id = $request->payment_method_id;
            $paymentDetails->member_id = Auth::user()->id;
            $paymentDetails->status = 0;
            $paymentDetails->save();
    
            if($request->payment_reason_id == 2){ //Event Register
                $eventStore = new EventRegister();
                $eventStore->self = $request->self;
                $eventStore->spouse = $request->spouse;
                $eventStore->child_above = $request->child_above;
                $eventStore->child_bellow = $request->child_bellow;
                $eventStore->guest = $request->guest;
                $eventStore->driver = $request->driver;
                $eventStore->total_person = $request->total_person;
                $eventStore->total_amount = $request->amount;
                $eventStore->payment_details_id = $paymentDetails->id;
                $eventStore->event_id = $request->ref_reason_id;
                $eventStore->member_id = Auth::user()->id;
                $eventStore->save();
                
                $notification=array('messege'=>'Event Register successfully!','alert-type'=>'success');
                return redirect()->route('transaction-event.index')->with($notification);
            }
            if($request->payment_reason_id == 3){ //Anuual Fees
                $eventStore = new EventRegister();
                $eventStore->self = $request->self;
                $eventStore->spouse = $request->spouse;
                $eventStore->child_above = $request->child_above;
                $eventStore->child_bellow = $request->child_bellow;
                $eventStore->guest = $request->guest;
                $eventStore->driver = $request->driver;
                $eventStore->total_person = $request->total_person;
                $eventStore->total_amount = $request->amount;
                $eventStore->payment_details_id = $paymentDetails->id;
                $eventStore->event_id = $request->ref_reason_id;
                $eventStore->member_id = Auth::user()->id;
                $eventStore->save();
                
                $notification=array('messege'=>'Anuual fees payment successfully!','alert-type'=>'success');
                return redirect()->route('transaction-annual.index')->with($notification);
            }

            if($request->payment_reason_id == 1){
                return redirect()->route('member-approve.padding');
            }else{
                return redirect()->back();
            }
        }catch (PostTooLargeException $e) {
            return redirect()->back()->with('error', 'File size exceeds the limit.');
        }
    }
    public function downloadSlip($id)
    {
        try {
            $data = PaymentDetails::findOrFail($id);
            $filePath = public_path($data->slip);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return redirect()->back()->with('error', 'PDF file not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
    
    /**____________________________________________________________________________________________
     * MEMBER REGISTATION => APPROVE
     * ____________________________________________________________________________________________
     */
    public function approveIndexRegistation() 
    {
        $data = PaymentDetails::where('status', 0)->where('payment_reason_id', 1)->where('payment_method_id','!=', 2)->get(); // payment_reason_id => 1 => Membership
        $bank = PaymentDetails::where('status', 0)->where('payment_reason_id', 1)->where('payment_method_id', 2)->get(); //payment_method_id => 2 => City Bank
        $record = PaymentDetails::whereIn('status', [1,2])->where('payment_reason_id', 1)->get();
        return view('layouts.pages.transaction.registation-approve', compact('data', 'record', 'bank'));
    }
    public function approveRegistationApproved($id) 
    {
        $data = PaymentDetails::findOrFail($id);
        $data->status = 1;
        $data->created_at = now()->format('Y-m-d');
        $data->user_id = Auth::user()->id;
        $data->save();

        // $mailData =[
        //     'title' => 'Your Payment Is Receive Successfully',
        //     'body' => 'This Is body',
        // ];
        // $user = User::find($data->member_id);
        // Mail::to($user->email)->send(new MemberApproved($mailData));

        $notification=array('messege'=>'Approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function approveRegistationCancel($id) 
    {
        $data = PaymentDetails::findOrFail($id);
        $data->status = 2;
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back();
    }
    public function approveRegistrationDetails($id) 
    {
        $data = PaymentDetails::where('id', $id)->first();
        
        return view('layouts.pages.transaction.registation-show', compact('data'));
    }
    /**____________________________________________________________________________________________
     * EVENT REGISTATION => USER SHOW
     * ____________________________________________________________________________________________
     */
    public function indexEventRegistation() 
    {
        $data = EventRegister::where('member_id', Auth::user()->id)->get();
        return view('layouts.pages.transaction.event-index',compact('data'));
    }
    /**____________________________________________________________________________________________
     * EVENT REGISTATION => APPROVE
     * ____________________________________________________________________________________________
     */
    public function approveIndexEvent() 
    {
        $data = PaymentDetails::where('status', 0)->where('payment_reason_id', 2)->where('payment_method_id','!=', 2)->get(); // payment_reason_id => 2 => Event
        $bank = PaymentDetails::where('status', 0)->where('payment_reason_id', 2)->where('payment_method_id', 2)->get(); //payment_method_id => 5 => City Bank
        $record = PaymentDetails::whereIn('status', [1,2])->where('payment_reason_id', 2)->get();
        return view('layouts.pages.transaction.event-approve', compact('data', 'record', 'bank'));
    }
    public function approveEventApproved($id) {
        
        $eventUpdate = EventRegister::findOrFail($id);
        $eventUpdate->status = 1;
        $eventUpdate->save();

        $data = PaymentDetails::findOrFail($eventUpdate->payment_details_id);
        $data->status = 1;
        $data->user_id = Auth::user()->id;
        $data->save();

        // $mailData =[
        //     'title' => 'You Event Registation Successfully',
        //     'body' => 'This Is body.',
        // ];
        // $user = User::find($data->member_id);
        // Mail::to($user->email)->send(new MemberApproved($mailData));

        $notification=array('messege'=>'Approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function approveEventCancel($id) {
        $data = PaymentDetails::findOrFail($id);
        $data->status = 2;
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back();
    }
    public function approveEventDetails($id) {
        $data = PaymentDetails::where('id', $id)->first();
        
        return view('layouts.pages.transaction.registation-show', compact('data'));
    }
    
    /**____________________________________________________________________________________________
     * ANNUAL REGISTATION => USER SHOW
     * ____________________________________________________________________________________________
     */
    public function indexAnnualFees() 
    {
        $data = PaymentDetails::where('member_id', Auth::user()->id)->get();
        return view('layouts.pages.transaction.annual-index',compact('data'));
    }

    /**____________________________________________________________________________________________
     * ANNUAL REGISTATION => APPROVE
     * ____________________________________________________________________________________________
     */
    public function approveIndexAnnualFees() 
    {
        $data = PaymentDetails::where('status', 0)->where('payment_reason_id', 3)->where('payment_method_id','!=', 2)->get(); // payment_reason_id => 2 => Event
        $bank = PaymentDetails::where('status', 0)->where('payment_reason_id', 3)->where('payment_method_id', 2)->get(); //payment_method_id => 5 => City Bank
        $record = PaymentDetails::whereIn('status', [1,2])->where('payment_reason_id', 3)->get();
        return view('layouts.pages.transaction.annual-approve', compact('data', 'record', 'bank'));
    }
    public function approveAnnualApproved($id) {
        
        $eventUpdate = EventRegister::findOrFail($id);
        $eventUpdate->status = 1;
        $eventUpdate->save();

        $data = PaymentDetails::findOrFail($eventUpdate->payment_details_id);
        $data->status = 1;
        $data->user_id = Auth::user()->id;
        $data->save();

        // $mailData =[
        //     'title' => 'You Event Registation Successfully',
        //     'body' => 'This Is body.',
        // ];
        // $user = User::find($data->member_id);
        // Mail::to($user->email)->send(new MemberApproved($mailData));

        $notification=array('messege'=>'Approve successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function approveAnnualCancel($id) {
        $data = PaymentDetails::findOrFail($id);
        $data->status = 2;
        $data->user_id = Auth::user()->id;
        $data->save();

        return redirect()->back();
    }
    public function approveAnnualDetails($id) {
        $data = PaymentDetails::where('id', $id)->first();
        
        return view('layouts.pages.transaction.registation-show', compact('data'));
    }

    /**_________________________________________________________________________________________
     * _________________________________________________________________________________________
     *  PAYMENT NUMBER => MASTER
     * _________________________________________________________________________________________
     * _________________________________________________________________________________________
     */
    public function indexPaymentNumber() {
        $data = PaymentNumber::get();
        $user = User::where('status', 1)->get();
        
        $payment_reasons = PaymentReasons::get();
        $payment_methods = PaymentMethods::get();
        $ref_reason = Event::where('status', 1)->get();
        return view('layouts.pages.transaction.payment-number-index', compact('data', 'user', 'payment_reasons', 'payment_methods', 'ref_reason'));
    }
    public function storePaymentNumber(Request $request) {
        //----Validation Check 
        $rules = [
            'number' => 'required',
            'member_id' => 'required',
            'payment_reason_id' => 'required',
            'payment_method_id' => 'required',
        ];
        if ($request->payment_reason_id == 2) {
            $rules['ref_reason_id'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //----Data Save
        if(isset($request->id)){
            $data = PaymentNumber::findOrFail($request->id);
        }else{
            $data = new PaymentNumber();
        }
        $data->number = $request->number;
        $data->payment_reason_id = $request->payment_reason_id;
        $data->payment_method_id = $request->payment_method_id;
        $data->ref_reason_id = $request->ref_reason_id;
        $data->member_id = $request->member_id;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();
        
        // Return message
        return response()->json([
            'data' => $data,
            'user' => $data->user->name,
            'paymentReason' => $data->paymentReason->name,
            'paymentMethod' => $data->paymentMethod->name,
        ], 200);
    }
    public function editPaymentNumber(Request $request)
    {
        $data = PaymentNumber::where('id', $request->id)->first();
        
        $payment_reasons = PaymentReasons::get();
        $payment_methods = PaymentMethods::get();
        $ref_reasons = Event::where('status', 1)->get();
        // Return message
        return response()->json([
            'data' => $data,
            'reasons' => $payment_reasons,
            'methods' => $payment_methods,
            'ref_reason' => $ref_reasons,
        ], 200);
    }
    public function deletePaymentNumber(Request $request)
    {
        $data = MemberType::findOrFail($request->id);
        $data->is_delete = 1;
        $data->save();
        
        // Return message
        return response()->json(['data' => $data], 200);
    }

    /**_________________________________________________________________________________________
     * _________________________________________________________________________________________
     *  PAYMENT FEES ADD => MEMBER TYPE
     * _________________________________________________________________________________________
     * _________________________________________________________________________________________
     */
    public function indexPaymentFees() {
        $data = MemberType::where('status', 1)->get();
        return view('layouts.pages.transaction.payment-fees-index', compact('data'));
    }
    public function editPaymentFees(Request $request) {
        $data = MemberType::where('id', $request->id)->first();
        // Return message
        return response()->json(['data' => $data], 200);
    }
    public function storePaymentFees(Request $request) {
        $data = MemberType::findOrFail($request->id);
        if($request->annual_fee){
            $data->annual_fee = $request->annual_fee;
        }else{
            $data->registration_fee = $request->registration_fee;
        }
        $data->save();
        // Return message
        return response()->json(['data' => $data, 'user' => $data->user->name], 200);
    }
    /**_________________________________________________________________________________________
     * _________________________________________________________________________________________
     *  GET AJAX DATA
     * _________________________________________________________________________________________
     * _________________________________________________________________________________________
     */
    public function getPaymentNumber(Request $request)
    {
        $data = PaymentNumber::where('payment_method_id', $request->method_id)->get();
        // Return message
        return response()->json(['data' => $data], 200);
    }
}
