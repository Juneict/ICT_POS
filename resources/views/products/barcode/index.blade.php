@extends('layouts.app')

@section('content')
<style>
    
</style>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
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
                                <h4 style="float:left">Products Barcode</h4>
                            </div>
                            <div class="card-body">
                                <div id="print">
                                  <div class="row">
                                    @forelse ( $productsBarcode as $barcode)
                                      <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                                        <div class="card">
                                          <div class="card-body">
                                            <h5 class="text-center"  >{{ $barcode->product_name }}</h5>
                                            <h5 class="text-center" >{{ $barcode->price }} mmk</h5>
                                           
                                             {!! $barcode->barcode !!}
                                             <h4 class="text-center" style="margin-top:0.5em" >{{ $barcode->product_code }}</h4>
                                          </div>
                                        </div>
                                      </div>
                                    @empty
                                      <h3>No Data</h3>
                                    @endforelse
                                  </div>
                                </div>
                                
                            </div>
                        </div>
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