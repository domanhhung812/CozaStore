<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'facebook_id','phone','address','user_image'
    ];
    public static function getAllDataUsers()
    {

        $data = Users::all();
        // get() - querybuilder
        // all() - ORM
        if($data){
            // truoc khi chuyen ve Array hay kiem tra xem no co rong khong ?
            $data = $data->toArray();
        } else {
            $data = [];
        }

        return $data;
    }

    public function checkUserLogin($user, $pass)
    {
        $data2 = [];
        $query = Users::select('*')
                        ->where('username',$user)
                        ->where('password',$pass)
                        ->where('status',1)
                        ->first();
        if($query){
            $data2 = $query->toArray();
        }
        return $data2;
    }

}
