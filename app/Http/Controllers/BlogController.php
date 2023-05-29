<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BlogController extends Controller
{
    public function index()
    {
        $blogposts = Blogpost::all();
        return view('blog.index', compact('blogposts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Blogpost::create($validatedData);

        return redirect()->route('blog.index');
    }

    public function show($id)
    {
        $blogpost = Blogpost::find($id);
    
        if (!$blogpost) {
            // Handle the case when the blog post is not found
        }
        
        $pictures = ['pic1.jpg', 'pic2.jpg', 'pic3.jpg', 'pic4.jpg', 'pic5.jpg']; // Array of picture names
        
        $picture = Arr::random($pictures); // Randomly select a picture
        $blogpost->picture = $picture; // Add the picture property to the blog post
    
        return view('blog.show', compact('blogpost'));
    }

    public function edit($id)
    {
        $blogpost = Blogpost::find($id);
    
        return view('blog.edit', compact('blogpost'));
    }
    

    public function update(Request $request, Blogpost $blogpost)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blogpost->update($validatedData);

        return redirect()->route('blog.index');
    }

    public function destroy(Blogpost $blogpost)
    {
        $blogpost->delete();

        return redirect()->route('blog.index');
    }
}
