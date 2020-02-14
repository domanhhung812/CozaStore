<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Carbon\Carbon;
use App\Http\Requests\RequestResetPassword;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Mail;

class ForgotPasswordController extends Controller
{
    public function getFormResetPassword()
    {
        return view('auth.passwords.email');
    }
    public function getCodeResetPassword(Request $request)
    {
        $email = $request->email;
        $checkUsers = Users::where('email',$email)->first();

        if(!$checkUsers)
        {
            \Toastr::error('Email không tồn tại', 'Lỗi', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        $code = md5(time().$email);
        $checkUsers->code = $code;
        $checkUsers->time_code = Carbon::now();
        $checkUsers->save();
        $url = route('getNewPassword',['code'=> $checkUsers->code, 'email' => $email]);
        $data= [
            'route' => $url
        ];
        Mail::send('frontend.email.reset-pass', $data, function($message) use ($email){
	        $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu');
	    });

        \Toastr::success('Link lấy lại mật khẩu đã được gửi vào email của bạn', 'Thành công', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function resetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkUser = Users::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser)
        {
            \Toastr::error('Đường dẫn của bạn không chính xác. Vui lòng thử lại', 'Lỗi', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        return view('auth.passwords.reset');
    }
    public function saveResetPassword(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);
        if($request->password)
        {
            $code = $request->code;
            $email = $request->email;
            $checkUser = Users::where([
                'code' => $code,
                'email' => $email
            ])->first();
            if(!$checkUser)
            {
                \Toastr::error('Đường dẫn của bạn không chính xác. Vui lòng thử lại', 'Lỗi', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
            $checkUser->password = bcrypt($request->password);
            $checkUser->save();
            \Toastr::success('Bạn đã đổi lại mật khẩu thành công. Vui lòng đăng nhập', 'Thành công', ["positionClass" => "toast-top-right"]);
            return redirect()->route('get.login');
        }
    }
}
