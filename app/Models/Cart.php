<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table ='carts';
    protected $fillable =['product_id','product_price','product_qty','user_id'];
}
