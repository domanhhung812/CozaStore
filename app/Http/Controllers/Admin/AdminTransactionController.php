<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Products;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;
use Mail;

class AdminTransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('user:id,username')->paginate(8);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('admin.transaction.index', $viewData);
    }
    public function viewOrder(Request $request, $id){
        if($request->ajax()){
            $orders = Order::with('product')->where('or_transaction_id', $id)->get();
            $html = view('admin.component.order', compact('orders'))->render();
            return response()->json($html);
        }
    }
    public function activeTransaction(Request $request, $id)
    {
        $transactions = Transaction::find($id);

        $orders = Order::where('or_transaction_id', $id)->get();

        $checkUser = Users::join('transactions','transactions.tr_user_id','=','users.id')
                    ->where('transactions.id','=',$id)
                    ->select('users.*')
                    ->get();
        $dataProduct = Order::join('products','orders.or_product_id','=','products.id')
                    ->where('orders.or_transaction_id',$id)
                    ->select('*')
                    ->get();
        $email = json_decode($checkUser)[0]->email;
        
        if($orders){
            foreach($orders as $order){
                $product = Products::find($order->or_product_id);
                $pd = ProductDetails::where('pd_product_id',$order->or_product_id)->where('pd_size_id',$order->or_size)->first();
                $pd->pd_qty = $pd->pd_qty - $order->or_qty;
                
                $product->qty = $product->qty - $order->or_qty;

                if($product->qty == 0 || $pd->pd_qty == 0){
                    \Toastr::error('Xử lý đơn hàng thất bại', 'Thất bại', ["positionClass" => "toast-top-right"]);
                }
                $pd->save();
                $product->save();
            }
        }
        if(!$email)
        {
            \Toastr::error('Email không tồn tại', 'Lỗi', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        $data = [
            'transaction_id' => $id,
            'username' => json_decode($checkUser)[0]->username,
            'email' => json_decode($checkUser)[0]->email,
            'phone' => $transactions->tr_phone,
            'address' => $transactions->tr_address,
            'infoProduct' => json_decode($dataProduct),
            'total' => $transactions->tr_total,
            'paymentMethod' => $transactions->tr_payment_method
        ];
        $transactions->tr_status = Transaction::STATUS_DONE;
        $transactions->save();
        Mail::send('frontend.email.send-bill', $data, function($message) use ($email){
	        $message->to($email, 'Send payment bill')->subject('Hóa đơn thanh toán tại CozaStore');
	    });
        \Toastr::success('Xử lý đơn hàng thành công', 'Thành công', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function deleteTransaction(Request $request, Transaction $tr){
        if($request->ajax()){
            // dung la ajax gui len thi moi xu ly
            $id = $request->id;
            $del = $tr->deleteTransactionById($id);
            if($del){
               echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }
}
