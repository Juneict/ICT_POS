<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
           <div class="col-md-8">
                <div class="card">
                 
                        <div class="card-header">
                            <h4 style="float:left">Products</h4>
                            <a href="" class="btn btn-dark" style="float:right" data-toggle="modal" data-target="#addproduct">
                            <i class="fa fa-plus"></i>Add New Product</a>
                        </div>
                        {{-- <form action="{{ route('orders.store')}}" method="post">
                            @csrf --}}
                        <div class="card-body">
                            <div class="my-2">
                                <form wire:submit.prevent="InsertoCart">
                                    <input type="text" name="" id="" wire:model="product_code"class="form-control" placeholder="Enter Product Code here">
                                </form>
                            </div>
                            
                            @if (session()->has('Success'))
                                <div class="alert alert-success">
                                {{ session('Success') }}
                                </div>
                            @elseif(session()->has('Error'))
                                <div class="alert alert-danger">
                                    {{ session('Error') }}
                                </div>
                            @elseif(session()->has('info'))
                                <div class="alert alert-info">
                                    {{ session('info') }}
                                </div>
                            @endif
                            <table class="table  table-left">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Dis (%)</th>
                                            <th colspan="6">Total</th>
                                            {{-- <th><a href="" class="btn btn-sm btn-success add_more rounded-circle"><i class="fas fa-plus"></i></a></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="addMoreProduct">
                                        @foreach ( $productIncart as $key=>$cart)
                                                                                   
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td width="30%">
                                               <input type="text" value="{{ $cart->product->product_name}}" class="form-control">
                                            </td>
                                            <td width="15%">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <button wire:click.prevent="IncrementQty({{ $cart->id}})" class="btn btn-sm btn-success">+ </button>
                                                    </div> 
                                                    <div class="col-md-1">
                                                        {{ $cart->product_qty}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button wire:click.prevent="DecrementQty({{ $cart->id}})" class="btn btn-sm btn-danger">-</button>
                                                    </div> 
                                                </div>
                                                
                                            </td>
                                            <td>
                                                <input type="number" value="{{ $cart->product->price}}" class="form-control price">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control discount">
                                            </td>
                                            <td>
                                                <input type="number" value="{{$cart->product_qty*$cart->product->price}}"  class="form-control total_amount">
                                            </td>
                                            <td><a href="" class="btn btn-sm btn-danger delete"><i class="fas fa-times" wire:click="removeProduct({{$cart->id}})"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                            </table>
                            
                        </div>
                    </div>
           </div>
          
           <div class="col-md-4">
            <div class="card">
                <form action="{{ route('orders.store')}}" method="POST">
                    @csrf
                    @foreach ( $productIncart as $key=>$cart)
                                                                                           
                           <input type="hidden" name="product_id[]" value="{{ $cart->product->id}}" class="form-control">
                                        
                           <input type="hidden" name="quantity[]" value=" {{ $cart->product_qty}}">
                    
                            <input type="hidden" name="price[]" value="{{ $cart->product->price}}" class="form-control price">
                       
                            <input type="hidden" name="discount[]" value="{{ $cart->product->discount}}" class="form-control discount">
                        
                            <input type="hidden" name="total_amount[]" value="{{$cart->product_qty*$cart->product->price}}"  class="form-control total_amount">
                            
                    @endforeach
                    
                    <div class="card-header"><h4>Total <b class="total">{{ $productIncart->sum('product_price')}}</b> mmk</h4></div>
                    <div class="card-body">
                        <div class="btn-group">
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-primary"><i class="fa fa-print"></i> Histroy</button>
                            <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-danger"><i class="fa fa-print"></i> Report</button>
                        </div>
                        <div class="panel">
                            <div class="row">
                                <table class="table table-striped">
                                    




                                    <tr>
                                        <td>
                                            <label for="">Customer Name</label>
                                            <input type="text" class="form-control" name="customer_name">
                                        </td>
                                        <td>
                                            <label for="">Customer Phone</label>
                                            <input type="text" class="form-control" name="customer_phone">
                                        </td>
                                    </tr>
                                </table>
                                <td>Payment
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="Cash" checked="checked">
                                        <label for="payment_method"><i class="fa fa-money-bill text-success"></i>Cash</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="BankTransfer">
                                        <label for="payment_method"><i class="fa fa-university text-danger"></i>Bank</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="payment_method" id="payment_method" class="true" value="Credit-Card" >
                                        <label for="payment_method"><i class="fa fa-credit-card text-info"></i>Credit-Card</label>
                                    </span>
                                </td>
                                <td>
                                    Payment 
                                    <input type="number" wire:model="pay_money" name="paid_amount" id="paid_amount" class="form-control">
                                </td>
                                <td>
                                    Returning Change 
                                    <input type="number" wire:model="balance" name="balance" id="balance" class="form-control" readonly>
                                </td>
                                <td>
                                    <button class="btn-primary btn-lg btn-block mt-3">Save</button>
                                </td>
                                <td>
                                    <button class="btn-danger btn-lg btn-block mt-3">Calculator</button>
                                </td>
                                <td>
                                    <a href="" class="text-center mt-3"><i class="fa fa-sign-out"></i> logout</a>
                                </td>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
       </div>
        </form>
    </div>
</div>
</div>
