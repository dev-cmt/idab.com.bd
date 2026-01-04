<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Admin\BlogPost;
use App\Models\User;
use App\Helpers\ImageHelper;

class BlogController extends Controller
{
    public function index()
    {
        $data = BlogPost::with('author')->latest()->get();
        return view('layouts.pages.blog.index', compact('data'));
    }

    public function create()
    {
        $users = User::all(); // Fetch all users to assign as authors
        return view('layouts.pages.blog.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // 'url_slug' => 'required|string|unique:blog_posts,url_slug',
            'content' => 'nullable',
            'image_path' => 'nullable',
            'publish_date' => 'nullable',
            'status' => 'required|in:published,draft',
        ]);

        BlogPost::create([
            'title' => $validated['title'],
            'url_slug' => Str::slug($validated['title']),
            'image_path' => ImageHelper::uploadImage($validated['image_path'], 'images/news-blog', null),
            'content' => $validated['content'],
            'publish_date' => $validated['publish_date'],
            'author_id' => Auth::user()->id,
            'status' => $validated['status'],
        ]);

        
        $notification=array('messege' => 'New & blog add successfully!','alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }

    public function edit(BlogPost $blog)
    {
        $users = User::all(); // Fetch all users to assign as authors
        return view('layouts.pages.blog.edit', compact('blog', 'users'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url_slug' => 'nullable|string|unique:blog_posts,url_slug,' . $blog->id,
            'content' => 'nullable',
            'publish_date' => 'nullable',
            'status' => 'required|in:published,draft',
        ]);

        $blog->update([
            'title' => $validated['title'],
            'url_slug' => Str::slug($validated['title']),
            'image_path' => ImageHelper::uploadImage($request->image_path, 'images/news-blog', $blog->image_path),
            'content' => $validated['content'],
            'publish_date' => $validated['publish_date'],
            'author_id' => Auth::user()->id,
            'status' => $validated['status'],
        ]);

        $notification=array('messege' => 'New & blog add successfully!','alert-type'=>'success');
        return redirect()->route('blog.index')->with($notification);
    }

    public function show(BlogPost $blog)
    {
        return view('layouts.pages.blog.show', compact('blog'));
    }

    public function destroy($id)
    {
         $data = BlogPost::findOrFail($id);

         if (File::exists("public/images/events/".$data->image)) {
             File::delete("public/images/events/".$data->image);
         }
         $data->delete();
         return back();
    }

    public function toggleHome($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->is_home = !$post->is_home; // Toggle boolean
        $post->save();

        return redirect()->back()->with('success', 'Blog post home status updated!');
    }
}
