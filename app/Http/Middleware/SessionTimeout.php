<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Session;

class SessionTimeout
{
  protected $timeout = 900; // default 15 minutes
    public function __construct()
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', time());
        } elseif (time() - Session::get('lastActivityTime') > $this->getTimeOut()) {
            Session::forget('lastActivityTime');
            Auth::logout();
            \Toastr::error('Session expired. Please login again!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('get.login');
        }
        Session::put('lastActivityTime', time());//f5 browser
        return $next($request);
    }
  
    protected function getTimeOut()
    {
        return (env('TIMEOUT')) ?: $this->timeout;
    }
}
