<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all(); // Retrieve all blogs from the database
        return view('blogs.index', compact('blogs')); // Pass the blogs to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Blog::create($request->except('_token'));
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Blog $blog)
    {
        $blog_details = Blog::find($id);
        return response()->json($blog_details);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if (empty($request->input('_token'))) {
            return false;
        }
        $blog = Blog::find($request->input('blog_id')); // Find the blog with the given id
        $blog->update($request->except('_token')); // Update the blog with the request data
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!'); // Redirect to the index page with a success message
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Blog $blog)
    { 
        if (empty($request->input('_token')) && $request->input('_method') != 'DELETE') {
            return false;
        }
        $blog = Blog::findOrFail($request->input('blog_id')); // Find the blog with the given id
        $blog->delete(); // Delete the blog
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!'); // Redirect to the index page with a success message
    }
}
