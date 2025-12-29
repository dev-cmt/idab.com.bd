<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Admin\Newsletter;
use App\Helpers\ImageHelper;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Newsletter::latest()->get();
        return view('layouts.pages.newsletter.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.pages.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'publish_date' => 'required',
        ]);

        Newsletter::create([
            'title' => $request->title,
            'file_path' => ImageHelper::uploadImage($request->file_path, 'images/newsletter', null),
            'publish_date' => $request->publish_date,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('newsletters.index')->with('success', 'Newsletter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        return view('layouts.pages.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'publish_date' => 'nullable',
        ]);

        $data = [
            'title' => $request->title,
            'file_path' => ImageHelper::uploadImage($request->file_path, 'images/newsletter', $newsletter->file_path),
            'publish_date' => $request->publish_date,
            'status' => $request->has('status'),
        ];
        

        $newsletter->update($data);

        return redirect()->route('newsletters.index')->with('success', 'Newsletter updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $filePath = public_path($newsletter->file_path);
        if ($newsletter->file_path && File::exists($filePath)) {
            File::delete($filePath);
        }
        $newsletter->delete();
    
        return redirect()->route('newsletters.index')->with('success', 'Newsletter deleted successfully.');
    }
    public function downloadNewsletter($id)
    {
        try {
            $data = Newsletter::findOrFail($id);
            $filePath = public_path($data->file_path);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } catch (\Exception $e) {
            return abort(500, 'An error occurred.');
        }
    }
}
