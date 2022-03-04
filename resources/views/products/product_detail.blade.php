<div class="row">
    @forelse ($products_details as $product)
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro ID</label>
                <img data-toggle="modal" data-target="#productPreview{{$product->id}}" src="{{asset('product/images/'.$product->product_image)}}"  width="70" style="cursor:pointer" alt="">
                <input type="text" class="form-control" value="{{ $product->id}}" readonly>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Name</label>
                <input type="text" class="form-control" value="{{ $product->product_name}}" readonly>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Code</label>
                <input type="text" class="form-control" value="{{ $product->product_code}}" readonly>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Price</label>
                <input type="text" class="form-control" value="{{ $product->price}}" readonly>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Qty</label>
                <input type="text" class="form-control" value="{{ $product->quantity}}" readonly>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Stock</label>
                <input type="text" class="form-control" value="{{ $product->alert_stock}}" readonly>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Description</label>
                <textarea  class="form-control" cols="3" rows="2">{{ $product->description}}</textarea>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Barcode</label>
                <span style="text-align: center">
                    {!! $product->barcode !!}
                    
                </span>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Pro Image</label>
                <span>
                    <img src="{{asset('product/images/'.$product->product_image)}}" width="150" style="cursor:pointer" alt="">
                </span>
                
            </div> 
        </div>
        @include('products.product_preview')
    @empty
        
    @endforelse
</div>