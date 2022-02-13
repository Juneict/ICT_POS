<style>
    .btn-outline{
        border-color:#008B8B;
        color:#008B8B;
    }
    .btn-outline:hover{
        background:#008B8B;
        color:#fff;
    }

</style>
<a href="" class="btn btn-outline rounded-pill" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill"   ><i class="fa fa-user"></i> Users</a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i> Products</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i> Cashiers</a>
<a href="" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i> Transactions</a>
<a href="" class="btn btn-outline rounded-pill"><i class="fa fa-chart"></i> Suppliers</a>
<a href="" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i> Customers</a>
<a href="" class="btn btn-outline rounded-pill"><i class="fa fa-truck"></i> Incoming</a>
<a href="{{ route('products.barcode') }}" class="btn btn-outline rounded-pill"><i class="fa fa-barcode"></i> Barcode</a>