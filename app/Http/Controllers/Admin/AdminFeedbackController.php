<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comments;
use App\Models\Blogs;

class AdminFeedbackController extends Controller
{
    
    public function getFeedbackProducts(Request $request){
        $data = Comments::join('products','products.id', '=', 'comments.co_product_id')
                        ->select('comments.*', 'products.name_product')
                        ->orderBy('comments.id')
                        ->paginate(10);

        return view('admin.feedbacks.products', compact('data'));
    }
    public function deleteFeedback(Request $request, Comments $comments)
    {
        if($request->ajax()){
            $id = $request->id;
            $del = $comments->deleteFeedbackById($id);
            if($del){
                echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }
    public function getFeedbackBlogs(Request $request, Comments $comments){
        if($request->ajax()){
            $id = $request->id;
            if($id == 2){
                $data = $comments->getFeedbackBlogs();
                $html =  view('admin.feedbacks.blogs', compact('data'))->render();
                return response()->json($html);
            }
        }
    }

    public function postFeedbackProducts(Request $request, Comments $comments){
        if($request->ajax()){
            $id = $request->id;
            if($id == 1){
                $data = $comments->postFeedbackProducts();
                $html =  view('admin.feedbacks.products', compact('data'))->render();
                return response()->json($html);
            }
        }
    }
}
