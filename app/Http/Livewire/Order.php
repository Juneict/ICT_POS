<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Order extends Component
{
    public $orders,$products=[],$product_code,$message ='',$productIncart;
    public $pay_money, $balance='';

    public function mount(){
        $this->products =Product::all();
        $this->productIncart =Cart::all();
    }
    public function InsertoCart()
    {
        $countProduct = Product::where('id',$this->product_code)->first();
        if(!$countProduct){
        return session()->flash('Error','Product not found');
        }
        $countCartProduct =Cart::where('product_id',$this->product_code)->count();
       if($countCartProduct>0){
         return session()->flash('info','Product already in cart');
       }
       $add_to_cart =new Cart;
       $add_to_cart->product_id = $countProduct->id;
       $add_to_cart->product_qty = 1;
       $add_to_cart->product_price = $countProduct->price;
       $add_to_cart->user_id = auth()->user()->id;
       $add_to_cart->save();
       $this->productIncart->prepend($add_to_cart);
       $this->product_code =" ";
       return session()->flash('info','Product successfully added');
    }
    public function IncrementQty($cartId){
       
        $carts = Cart::find($cartId);
        
        if($carts->product_qty >= $carts->product->quantity){
            return session()->flash('info','Product'.$carts->product->product_name.'out of stock');
        }
        $carts->increment('product_qty',1);
        $updatePrice= $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }
    public function DecrementQty($cartId){
        $carts = Cart::find($cartId);
        if($carts->product_qty == 1){
            return session()->flash('info','Product'.$carts->product->product_name.'Quantity can not be less than 1 add quantity or remove item in cart');
        }
        $carts->decrement('product_qty',1);
        $updatePrice= $carts->product_qty * $carts->product->price;
        $carts->update(['product_price' => $updatePrice]);
        $this->mount();
    }
    public function removeProduct($cartId){
        $deleteCart =Cart::find($cartId);
        $deleteCart->delete();

        
        $this->productIncart =$this->productIncart->except($cartId);
        return session()->flash('Error','Product removed');
    }
    public function render()
    {
       if ($this->pay_money != '') {
            $totalPrice = $this->productIncart->sum('product_price');
            $totalAmount = $this->pay_money-$totalPrice;
            $this->balance =$totalAmount;
       }
       
        return view('livewire.order');
    }
   
}
