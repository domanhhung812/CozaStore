<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    // use Auth;
    use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/home';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');
        
        if(\Auth::attempt($credentials)){
            \Toastr::success('Đăng nhập thành công', 'Thành công', ["positionClass" => "toast-top-right"]);
            return redirect()->route('home');
        }
        \Toastr::error('Đăng nhập thất bại vui lòng thử lại', 'Lỗi', ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('Thong bao', 'Login failed');
    }

    public function getLogout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }
}
