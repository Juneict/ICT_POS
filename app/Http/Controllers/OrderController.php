<?php

namespace App\Http\Controllers;


use App\Models\Order;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order_Detail;
use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::all();
        $orders =Order::all();
        $lastID =Order_Detail::max('order_id');
        $order_receipt = Order_Detail::where('order_id',$lastID)->get();
        return view('orders.index',compact('products','orders','order_receipt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return($request->all());
        DB::transaction(function() use($request){
            //Order Model
            $orders = New Order;
            $orders->name = $request->customer_name;
            $orders->phone =$request->customer_phone;
            $orders->save();
            $order_id = $orders->id;

            //Order_details Model
            for ($product_id=0; $product_id < count($request->product_id) ; $product_id++) { 
                $order_details = new Order_Detail;
                $order_details->order_id = $order_id;
                $order_details->product_id =$request->product_id[$product_id];
                $order_details->unitprice =$request->price[$product_id];
                $order_details->quantity =$request->quantity[$product_id];
                $order_details->discount =$request->discount[$product_id];
                $order_details->amount =$request->total_amount[$product_id];
                $order_details->save();
            };
           
            //Transaction Model
            $transactions = new Transaction;
            $transactions->order_id = $order_id;
            $transactions->user_id =auth()->user()->id;
            $transactions->balance =$request->balance;
            $transactions->paid_amount =$request->paid_amount;
            $transactions->payment_method=$request->payment_method;
            $transactions->transac_amount =$order_details->amount;
            $transactions->transac_date =date('Y-m-d');
            $transactions->save();

            //last order history
            $products = Product::all();
            $order_details= Order_Detail::where('order_id',$order_id)->get();
            $orderedBy=Order::where('id',$order_id)->get();

            return view('orders.index',compact('products','order_details','orderedBy') );

        });
        return back()->with('Product Fail to inserted! Check your inputs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        
    }
}
