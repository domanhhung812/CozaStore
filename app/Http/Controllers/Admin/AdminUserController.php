<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index(){
        $users = Users::whereRaw(1);
        $users = $users->orderBy('id','ASC')->paginate(10);

        $viewData = [
            'users' => $users
        ];

        return view('admin.users.index', $viewData);
    }
}
