<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class UserProfileController extends Controller
{
    public function index(){
        $userId = \Auth::id();
        $data = Users::select('*')
                        ->where('id', $userId)
                        ->get();
        return view('frontend.user.profile', compact('data'));
    }
    public function editProfile(Request $request){
        $data = $request->except('_token');
        $user = Users::find(\Auth::id());
        $user->update($data);
        \Toastr::success('Updated succesfully', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();

    }
}
