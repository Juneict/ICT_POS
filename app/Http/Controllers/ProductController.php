<?php

namespace App\Http\Controllers;

use Picqer;
use App\Models\User;
use App\Models\Product;
use Picqer\Barcode\Barcode;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index',compact('products'));
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
        
        $product_code = rand(106890122,100000000);
        
        $redColor = '255,0,0';
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes =$generator->getBarcode($product_code,
        $generator::TYPE_STANDARD_2_5,2,60);


        Product::create($request->all());

        $products = new Product;
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->quantity = $request->quantity;
        $products->description = $request->description;
        $products->brand = $request->brand;
        $products->barcode = $barcodes;
        $products->alert_stock = $request->alert_stock;
        $products->price = $request->price;
        $products->save();
        return redirect()->back()->with('Success','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$products)
    {
        $product_code = rand(106890122,100000000);  
        $redColor = '255,0,0';
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes =$generator->getBarcode($product_code,
        $generator::TYPE_STANDARD_2_5,2,60);
        $products = Product::find($products);
        $products->product_name = $request->product_name;
        $products->product_code = $product_code;
        $products->quantity = $request->quantity;
        $products->description = $request->description;
        $products->brand = $request->brand;
        $products->barcode = $barcodes;
        $products->alert_stock = $request->alert_stock;
        $products->price = $request->price;
        $products->save();
       
        return redirect()->back()->with('Success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('Error','Product Deleted Successfully');
    }
    public function GetProductBarcodes(){
        $productsBarcode = Product::select('barcode','product_code','product_name','price')->get();
        return view('products.barcode.index',compact('productsBarcode'));
    }
}
