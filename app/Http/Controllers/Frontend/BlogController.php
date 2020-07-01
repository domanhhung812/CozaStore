<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Comments;
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
        $url = $request->segment('4');
		$id = preg_split('/(-)/i', $url)[0];
        $blog = Blogs::find($id);
        return view('frontend.blog.detail', compact('blog'));
    }
    public function postComments(Request $request, $id)
	{
		$url = $request->segment('4');
		$id = preg_split('/(-)/i', $url)[0];
		$comments = new Comments;
		$comments->co_name = $request->co_name;
		$comments->co_email = $request->co_email;
		$comments->co_content = $request->co_content;
        $comments->co_product_id = 0;
        $comments->co_blog_id = $id;
        $comments->co_rating = $request->rating;
		$comments->save();
		\Toastr::success('Add comment successfully', '', ["positionClass" => "toast-top-right"]);
		return view('frontend.blog.index');
	}
}
