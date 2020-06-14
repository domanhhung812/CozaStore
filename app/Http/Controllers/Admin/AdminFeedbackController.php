<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comments;

class AdminFeedbackController extends Controller
{
    public function getFeedbackProducts(){
        $data = Comments::join('products','products.id', '=', 'comments.co_product_id')
                        ->select('comments.*', 'products.name_product')
                        ->orderBy('comments.id')
                        ->paginate(10);

        return view('admin.feedbacks.products', compact('data'));
    }
}
