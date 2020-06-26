<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comments extends Model
{
    protected $table = 'comments';
    protected $guarded = ['*'];

    public function deleteFeedbackById($id)
    {
        $del = DB::table('comments')
                   ->where('id',$id)
                   ->delete();
        return $del;
    }
    public function getFeedbackBlogs(){
        $data = DB::table('comments')
                    ->join('blogs','blogs.id', '=', 'comments.co_blog_id')
                    ->select('comments.*', 'blogs.b_name')
                    ->orderBy('comments.id')
                    ->paginate(10);
        return $data;
    }
    public function postFeedbackProducts(){
        $data =DB::table('comments')->join('products','products.id', '=', 'comments.co_product_id')
                        ->select('comments.*', 'products.name_product')
                        ->orderBy('comments.id')
                        ->paginate(10);

        return $data;
    }
}
