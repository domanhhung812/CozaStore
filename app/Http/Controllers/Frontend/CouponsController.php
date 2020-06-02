<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupons;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponsController extends Controller
{
    public function store(Request $request){
        $coupon = Coupons::where('code', $request->coupons_code)->first();
        
        if(!$coupon){
            \Toastr::error('Invalid coupon code. Please try again!', 'Errors', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        session()->put('coupon',[
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal())
        ]);
        \Toastr::success('Coupon has been apllied', 'Successful', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function destroy(){
        session()->forget('coupon');
        \Toastr::success('Coupon has been removed', 'Successful', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
