<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function getBlog()
    {
        $blogs = Blogs::select('*')->paginate(5);
        return view('frontend.blog.index', compact('blogs'));
    }
    public function getDetailBlogs(Request $request, $id)
    {
        $blog = Blogs::find($id);
        return view('frontend.blog.detail', compact('blog'));
    }
}
