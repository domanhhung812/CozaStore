<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['*'];


    protected $fillable = [
        'username', 'email', 'password', 'facebook_id', 'remember_token'
    ];

    // public function addNew($input)
    // {
    //     $check = static::where('facebook_id',$input['facebook_id'])->first();


    //     if(is_null($check)){
    //         return static::create($input);
    //     }


    //     return $check;
    // }
}
