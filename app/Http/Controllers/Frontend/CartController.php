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
        $product = Products::select('name_product', 'id', 'price', 'qty', 'image_product')->find($id);

        if(!$product) return redirect('/');

        if($product->qty == 0){
            \Toastr::warning('Sản phẩm đã hết vui lòng chọn sản phẩm khác', 'Cảnh báo', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        Cart::add([
            			'id' => $id,
            			'name' => $product->name_product,
            			'qty' => 1,
            			'price' => $product->price,
            			'options' => [
            				'images' => json_decode($product->image_product,true)[0],
            			]
                    ]);
        \Toastr::success('Thêm vào giỏ hàng thành công', 'Thành công', ["positionClass" => "toast-top-right"]);
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
        $totalMoney = str_replace(',','', Cart::subtotal(0,3));
        $id = Auth::id();
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => $id,
            'tr_total' => (int)$totalMoney,
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
        ]);

        if($transactionId)
        {
            $products = Cart::content();
            foreach($products as $product){
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' => $product->price,
                    // 'or_sale' => $product->price,
                ]);
            }
        }
        Cart::destroy();
        \Toastr::success('Đặt hàng thành công', 'Thành công', ["positionClass" => "toast-top-right"]);
        return redirect('/');
    }
}
