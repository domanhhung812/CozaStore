<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Users;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Input;

use Session;
use Stripe;
use Mail;


class CartController extends BaseController
{
    public function deleteCart($rowId)
    {   
        Cart::remove($rowId);
        return redirect()->route('fr.getListCart');
    }

    public function updateCart(Request $request)
    {
        // dd($request->all());
        Cart::update($request->rowId, $request->qty);
        return redirect()->back();
    }

    public function addCart(Request $request, $id)
    {
        $product = Products::select('name_product', 'id', 'price','colors_id','sizes_id', 'qty', 'image_product','sale_off','categories_id')->find($id);
        if(!$product) return redirect('/');
        
        if($product->qty == 0 || $request->qty2 == 0){
            \Toastr::warning('This product is out of stock. Please choose anothers', '', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        $countStr = strlen($product->categories_id);
        $idCate2 = substr($product->categories_id,-($countStr-2));
        $idCate = substr($idCate2,0,($countStr-4));
        Cart::add([
            			'id' => $id,
            			'name' => $product->name_product,
            			'qty' => $request->num_product,
            			'price' => $product->price - $product->price * $product->sale_off /100,
            			'options' => [
                            'images' => json_decode($product->image_product,true)[0],
                            'size' => $request->inlineRadioOptions,
                            'color' => $request->inlineRadioOptionsColor,
                            'cate' => $idCate,
            			]
                    ]);
        \Toastr::success('Add to cart successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function getListCart(){
        $products =  Cart::content();
        return view('frontend.cart.showCart', compact('products'));
    }
    public function getFormPayment(){
        $products =  Cart::content();
        return view('frontend.cart.payment',compact('products'));
    }
    public function saveInfoShoppingCart(Request $request){
        $totalMoney = Cart::subtotal();
        if($totalMoney >= 100){
            $totalMoney1 = $totalMoney;
        }else if($totalMoney == 0){
            $totalMoney1 = 0;
        }
        else{
            $totalMoney1=$totalMoney + 20;
        }
        $discount = session()->get('coupon')['discount'];
        if($discount){
            $totalMoney2= $totalMoney1 - $discount;
        }else{
            $totalMoney2 = $totalMoney1;
        }
        
        $id = Auth::id();
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => $id,
            'tr_total' => $totalMoney2,
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
            'tr_payment_method' => $request->payment
        ]);
        if($request->payment === 'Stripe'){
            return view('frontend.payment.index');
        }else{
            if($transactionId)
            {
                $products = Cart::content();
                foreach($products as $product){
                    Order::insert([
                        'or_transaction_id' => $transactionId,
                        'or_product_id' => $product->id,
                        'or_qty' => $product->qty,
                        'or_price' => $product->price - $product->price * $product->sale_off /100,
                        'or_payment_method' => $request->payment,
                        'or_size' => $product->options->size,
                        'or_color' => $product->options->color
                        // 'or_sale' => $product->price,
                    ]);
                }
            }
            Cart::destroy();
            $request->session()->forget('coupon')['discount'];
            \Toastr::success('Ordered successfully', '', ["positionClass" => "toast-top-right"]);
            return redirect('/');
        }
        
    }
    public function stripe()
    {
        return view('frontend.payment.index');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function payStripe(Request $request)
    {
        $id = Auth::id();
        $totalMoney = Cart::subtotal();
        if($totalMoney >= 100){
            $totalMoney1 = $totalMoney;
        }else if($totalMoney == 0){
            $totalMoney1 = 0;
        }
        else{
            $totalMoney1=$totalMoney + 20;
        }
        $discount = session()->get('coupon')['discount'];
        if($discount){
            $totalMoney2= $totalMoney1 - $discount;
        }else{
            $totalMoney2 = $totalMoney1;
        }
        $transactionId = Transaction::select('id')->where('tr_user_id', $id)->get();
        $arr_id = json_decode($transactionId);
        //GET LASTED ID
        $max = count($arr_id);
        $or_id = $arr_id[$max - 1]->id;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $totalMoney2 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for CozaStore" 
        ]);
        
        $products = Cart::content();
        foreach($products as $product){
            $order = new Order;
            $order->or_transaction_id = $or_id;
            $order->or_product_id = $product->id;
            $order->or_qty = $product->qty;
            $order->or_price = $product->price - $product->price * $product->sale_off /100;
            $order->or_payment_method ='Stripe';
            $order->save();
            // 'or_sale' => $product->price,
        }
        Cart::destroy();
        $request->session()->forget('coupon')['discount'];
        \Toastr::success('Ordered successfully', '', ["positionClass" => "toast-top-right"]);
        return redirect('/');
    }
}
