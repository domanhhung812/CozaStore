<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('user:id,username')->paginate(10);

        $viewData = [
            'transactions' => $transactions
        ];

        return view('admin.transaction.index', $viewData);
    }
    public function viewOrder(Request $request, $id){
        if($request->ajax()){
            $orders = Order::with('product')->where('or_transaction_id', $id)->get();
            // $image = DB::table('products')
            //         ->join('orders','products.id', '=', 'orders.or_product_id')
            //         ->select('products.image_product','orders.or_product_id','orders.or_transaction_id')
            //         ->where('orders.or_transaction_id', $id)
            //         ->get();
            // $viewData = [
            //     'image' => json_decode($image,true)[0]
            // ];
            $html = view('admin.component.order', compact('orders'))->render();
            return response()->json($html);
        }
    }
    public function activeTransaction(Request $request, $id)
    {
        $transactions = Transaction::find($id);

        $orders = Order::where('or_transaction_id', $id)->get();
        
        if($orders){
            foreach($orders as $order){
                $product = Products::find($order->or_product_id);

                $product->qty = $product->qty - $order->or_qty;

                if($product->qty == 0){
                    \Toastr::error('Xử lý đơn hàng thất bại', 'Thất bại', ["positionClass" => "toast-top-right"]);
                }

                $product->save();
            }
        }

        $transactions->tr_status = Transaction::STATUS_DONE;
        $transactions->save();
        \Toastr::success('Xử lý đơn hàng thành công', 'Thành công', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
