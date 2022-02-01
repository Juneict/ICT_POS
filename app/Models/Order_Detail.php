<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table ='order_details';
    protected $fillable =['order_id','product_id','unitprice','quantity','amount','discount'];

    /**
     * Get the user that owns the Order_Detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
