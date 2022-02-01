<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
           <div class="col-md-8">
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
                                                <select name="product_id[]" id="product_id" class="form-control product_id">
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
           <div class="col-md-4">
            <div class="card">
                    <div class="card-header"><h4>Total <b class="total"></b> mmk</h4></div>
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
                                    <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                                </td>
                                <td>
                                    Returning Change 
                                    <input type="number" name="balance" id="balance" class="form-control" readonly>
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
                            </div>
                        </div>
                    </div>
                </div>
       </div>
        </form>
    </div>
</div>
</div>
