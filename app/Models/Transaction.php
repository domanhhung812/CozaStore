<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Transaction extends Model
{
    protected $table="transactions";
    protected $guarded = ['*'];

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    public function user(){
        return $this->belongsTo(Users::class, 'tr_user_id');
    }
    public function deleteTransactionById($id)
    {
        $del = DB::table('transactions')
                   ->where('id',$id)
                   ->delete();
        return $del;
    }
}
