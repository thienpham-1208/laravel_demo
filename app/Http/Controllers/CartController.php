<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Alert;
use Auth;
class CartController extends Controller
{
    public function addCart($id, Request $request){
       if(!Auth::check()) {
           return redirect(route('login'));
       }
       $product = Product::find($id);
       $image = $product->image;
       $qty = $request->qty? (int)$request->qty:1 ;
      $price = (float)$product->price;
      $size = $request->size?$request->size:$product->size ;
        Cart::add($product->id,$product->name,$qty,$price,0,['size'=>$size,'image'=>$image]);
        alert()->success('Successfully', "Thêm vào giỏ hàng thành công");
        return back();
    }
    public function showCart(){
        
        return view('pages.showCart');

       
    }
    public function update($rowID, Request $request){
        $qty = $request->qty;
        Cart::update($rowID, $qty);
        return back();
    }
    public function delete($rowId){
        Cart::remove($rowId);
        alert()->info('Successfully', "Bạn đã xóa 1 sản phẩm");
        return back();
    }
}
