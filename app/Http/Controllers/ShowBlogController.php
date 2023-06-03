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

        }
    
        $pictures = ['pic1.jpg', 'pic2.jpg', 'pic3.jpg', 'pic4.jpg', 'pic5.jpg'];
    
        $picture = Arr::random($pictures);
        $blogpost->picture = $picture;
    
        return view('blog.show', compact('blogpost'));
    }
}
