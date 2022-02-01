<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Order extends Component
{
    public $orders,$products=[],$product_code;

    public function mount(){
        $this->products =Product::all();
    }
    public function InsertoCart()
    {
        $countProduct = Product::where('id',$this->product_code)->get();

       
    }
    public function render()
    {
        return view('livewire.order');
    }
   
}
