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
}
