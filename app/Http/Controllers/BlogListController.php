<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogpost;

use Illuminate\Support\Arr;

class BlogListController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        $blogposts = Blogpost::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%'.$search.'%');
        })->get();
    
        $pictures = ['pic1.jpg', 'pic2.jpg', 'pic3.jpg', 'pic4.jpg', 'pic5.jpg']; // Array of picture names
    
        $blogposts = $blogposts->map(function ($blogpost) use ($pictures) {
            $picture = Arr::random($pictures); // Randomly select a picture
            $blogpost->picture = $picture; // Add the picture property to the blog post
            return $blogpost;
        });
    
        return view('bloglist.index', compact('blogposts'));
    }
}


