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
        try{
            $this->validate($request, [
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users',
            ],[
                'name.required' => 'Name is required',
                'address.required' => 'Address is required',
                'phone.required' => 'Phone is required',
                'email.required' => 'Email is required',
                'email.unique' => 'This email is existed. Please try again!'
            ]);
        
            if ($request->hasFile('user_image')) {
                $image = $request->file('user_image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/images');
                $image->move($destinationPath, $name);
            }
            $data = Users::find(\Auth::id());
            $data->user_image = $name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
            \Toastr::success('Updated succesfully', '', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }catch(Exception $e){
            \Toastr::error('Updated failed', '', ["positionClass" => "toast-top-right"]);
        }

    }
}
