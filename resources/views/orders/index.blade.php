@extends('layouts.app')

@section('content')
<style>

select.form-control {
    -webkit-appearance: menulist;
}
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
                                <table class="table  table-left">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Dis (%)</th>
                                                <th>Total</th>
                                                <th><a href="" class="btn btn-sm btn-success add_more rounded-circle"><i class="fas fa-plus"></i></a></th>
                                            </tr>
                                        </thead>
                                        <tbody class="addMoreProduct">
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <select name="product_id" id="product_id" class="form-control product_id">
                                                        <option value="">Select items</option>
                                                        @foreach($products as $product)
                                                            <option data-price="{{$product->price}}" value="{{$product->id}}">{{$product->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                                </td>
                                                <td>
                                                    <input type="number" name="price[]" id="price" class="form-control price">
                                                </td>
                                                <td>
                                                    <input type="number" name="discount[]" id="discount" class="form-control discount">
                                                </td>
                                                <td>
                                                    <input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount">
                                                </td>
                                                <td><a href="" class="btn btn-sm btn-danger delete"><i class="fas fa-times"></i></a></td>
                                            </tr>
                                        </tbody>
                                       
                                </table>
                                
                            </div>
                        </div>
               </div>
               <div class="col-md-3">
                    <div class="card">
                            <div class="card-header"><h4>Total <b class="total"></b> mmk</h4></div>
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
@endsection

@section('script')
        
        <script>
            $('.add_more').on('click',function(e){
                e.preventDefault();
                var product =$('.product_id').html();
                var numberofrow =($('.addMoreProduct tr').length - 0) + 1;
                var tr = '<tr><td class="no">'+ numberofrow  + '</td>'+
                              '<td><select class="form-control product_id" name="product_id[]">'+product+'</select></td>'+
                              '<td><input type="number" name="quantity[]" class="form-control quantity"></td>'+
                              '<td><input type="number" name="price[]" class="form-control price"></td>'+
                              '<td><input type="number" name="discount[]" class="form-control discount"></td>'+
                              '<td><input type="number" name="total_amount[]" class="form-control total_amount"></td>'+
                              '<td><a href="" class="btn btn-sm btn-danger delete"><i class="fas fa-times"></i></a></td>'
                 $('.addMoreProduct').append(tr);
            });

            // delete row
           $('.addMoreProduct').delegate('.delete','click',function(e){
                e.preventDefault();
               $(this).parent().parent().remove();
           })

        //    logics
        function TotalAmount(){
            var total = 0 ;
            $('.total_amount').each(function(i,e){
                var amount = $(this).val() - 0;
                total += amount;
            })
            $('.total').html(total);
        }

        $('.addMoreProduct').delegate('.product_id','change',function(e){
                e.preventDefault();
              var tr = $(this).parent().parent();
              var price = tr.find('.product_id option:selected').attr('data-price');
              tr.find('.price').val(price);
              var qty = tr.find('.quantity').val() - 0;
              var disc = tr.find('.discount').val() - 0;
              var price = tr.find('.price').val() - 0 ;
              var total_amount =(qty*price)-((qty*price*disc) / 100);
              tr.find('.total_amount').val(total_amount);
              TotalAmount();
           })

           $('.addMoreProduct').delegate('.quantity,.discount','click',function(e){
            e.preventDefault();
              var tr = $(this).parent().parent();
             
              var qty = tr.find('.quantity').val() - 0;
              var disc = tr.find('.discount').val() - 0;
              var price = tr.find('.price').val() - 0 ;
              var total_amount =(qty*price)-((qty*price*disc) / 100);
              tr.find('.total_amount').val(total_amount);
              TotalAmount();
           })
        </script>
@endsection
