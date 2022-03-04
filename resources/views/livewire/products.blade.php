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
                            <i class="fa fa-plus"></i>Add New Product</a></div>
                        <div class="card-body">
                            @include('products.table')
                            
                        </div>
                    </div>
           </div>
           <div class="col-md-4">
                <div class="card">
                        <div class="card-header"><h4>Products Details</h4></div>
                        <div class="card-body">
                            @include('products.product_detail')
                        </div>
                        
                </div>
           </div>
        </div>
    </div>
</div>