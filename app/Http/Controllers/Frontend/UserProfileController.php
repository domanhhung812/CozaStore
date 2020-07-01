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
            if ($request->hasFile('user_image')) {
                $image = $request->file('user_image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/images');
                $image->move($destinationPath, $name);

                $data = Users::find(\Auth::id());
                if($data){
                    $data->user_image = $name;
                    $data->username = $request->username;
                    $data->email = $request->email;
                    $data->phone = $request->phone;
                    $data->address = $request->address;
                    
                    $data->save();
                    \Toastr::success('Updated succesfully', '', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                }
            }
            \Toastr::error('Updated failed', '', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
    }
}
