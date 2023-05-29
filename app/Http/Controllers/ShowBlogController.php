<?php
namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ShowBlogController extends Controller
{
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
}
