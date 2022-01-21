@extends('layouts.app')

@section('content')
<style>
    .modal.right .modal-dialog{
        
        top:0;
        right: 0;
        margin-right:20vh;
    }
    .modal.fade:not(.in).right .modal-dialog{
        -webkit-transform:translate3d(25%,0,0);
        transform:translate3d(25%,0,0);
    }
</style>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
               <div class="col-md-9">
                    <div class="card">
                    @if (session('Success'))
                        <div class="alert alert-success">
                            {{ session('Success') }}
                        </div>
                      @endif
                      @if (session('Error'))
                        <div class="alert alert-danger">
                            {{ session('Error') }}
                        </div>
                      @endif
                            <div class="card-header">
                                <h4 style="float:left">Products</h4>
                                <a href="" class="btn btn-dark" style="float:right" data-toggle="modal" data-target="#addproduct">
                                <i class="fa fa-plus"></i>Add New Product</a></div>
                            <div class="card-body">
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
                                                <td>{{$product->product_name}}</td>
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
                    <div class="modal right fade" id="editproduct{{$product->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Edit product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ $product->id}}
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{ route('products.update',$product->id)}}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group">
                                                        <label for="">Product Name</label>
                                                        <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Brand</label>
                                                        <input type="text" name="brand" value="{{$product->brand}}" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Price</label>
                                                        <input type="number" name="price" value="{{$product->price}}" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Quantity</label>
                                                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alert Stock</label>
                                                        <input type="number" name="alert_stock" value="{{$product->alert_stock}}" class="form-control"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea name="description" id="" cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
                                                    </div>
                
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block">Update</button>
                                                    </div>
                                                </form>
                                        </div>
                                
                                    </div>
                                </div>
                    </div> 
                                                            <!-- Modal of delete section -->
                    <div class="modal right fade" id="deleteproduct{{$product->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ $product->id}}
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{ route('products.destroy',$product->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <p>are you sure you want to delete this {{ $product->name }} ?</p>
                                                
                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-dismiss="modal">Cancle</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                        </div>
                                
                                    </div>
                                </div>
                    </div> 
                                             <!-- end modal section -->
                                             
                                            @endforeach
                                            {{ $products->links('pagination::bootstrap-4')}}
                                        </tbody>
                                       
                                </table>
                                
                            </div>
                        </div>
               </div>
               <div class="col-md-3">
                    <div class="card">
                            <div class="card-header"><h4>Search</h4></div>
                            <div class="card-body">
                                
                            </div>
                        </div>
               </div>
            </div>
        </div>
    </div>


    <!-- Modal section -->
    <div class="modal right fade" id="addproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <form action="{{ route('products.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Brand</label>
                                        <input type="text" name="brand" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="number" name="price" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alert Stock</label>
                                        <input type="number" name="alert_stock" class="form-control"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-dark btn-block">Save Product</button>
                                    </div>
                                </form>
                        </div>
                  
                    </div>
                </div>
    </div>  

<script>
  $(function () {
    $('div.alert').delay(3000).slideUp(300);
  });
</script>     
@endsection