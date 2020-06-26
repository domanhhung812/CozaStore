<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blogs extends Model
{
    protected $table = 'blogs';
    protected $guarded = ['*'];

    public function deleteBlogsById($id)
    {
        $del = DB::table('blogs')
                   ->where('id',$id)
                   ->delete();
        return $del;
    }
    public function getFeedbackBlogs($id){
        $data = DB::table('comments')
                    ->join('blogs','blogs.id', '=', 'comments.co_blog_id')
                    ->select('comments.*', 'blogs.b_name')
                    ->orderBy('comments.id')
                    ->paginate(10);
        return $data;
    }
}
