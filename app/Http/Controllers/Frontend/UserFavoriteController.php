<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\UserFavorite;

class UserFavoriteController extends Controller
{
    public function addFavorite($id, Request $request){
        if($request->ajax()){
            $product = Products::find($id);
            if(!$product){
                return response(['message' => 'Not exist product. Please choose again']);
            }
            $messages = 'Add favorite product successfully';
            try{
                \DB::table('user_favorite')->insert([
                    'uf_product_id' => $id,
                    'uf_user_id' => \Auth::id()
                ]);
            }catch(\Exception $e){
                $messages = 'This product was to be favorite';
            }
            return response(['messages' => $messages]);
        }
    }
    public function index(){
        $id = \Auth::id();
        // $data = Products::join('user_favorite','products.id','=','user_favorite.uf_id')
                        
        $products = Products::whereHas('favorite', function($query) use ($id){
            $query->where('uf_user_id',$id);
        })->select('id','name_product','image_product','price','pro_slug')
          ->paginate(10);
        
        return view('frontend.user.favorite',compact('products'));
    }
}
