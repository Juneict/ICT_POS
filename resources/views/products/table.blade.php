<table class="table table-bordered table-left">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Alert Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key=>$product)
        <tr>
            <td>{{$product->id }}</td>
            <td style="cursor:pointer" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click="ProductDetails({{$product->id}})">{{$product->product_name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->brand}}</td>
            <td>{{ number_format($product->price,2)}}</td>
            <td>{{$product->quantity}}</td>
            <td>@if($product->quantity <= $product->alert_stock) <span class="badge badge-danger">Low Stock
                @else 
                <span class="badge badge-success">Available</span>
                @endif
            </span></td>
            <td>
                <div class="btn-group">
                    <a href="" data-toggle="modal" data-target="#editproduct{{$product->id}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="" data-toggle="modal" data-target="#deleteproduct{{$product->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Del</a>
                </div>
            </td>
        </tr>
       
        <!-- Modal of edit section -->
        @include('products.edit')
                        <!-- Modal of delete section -->
        @include('products.delete')
         <!-- end modal section -->
         
        @endforeach
       
    </tbody>
   
</table>