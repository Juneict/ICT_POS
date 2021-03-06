<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable =['product_name','description','brand','price','quantity','alert_stock','qrcode','product_image'];

    public function orderdetail(){
        return $this->hasMany('App\Models\Order_Detail');
    }
    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }
}
