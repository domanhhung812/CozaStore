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
}
