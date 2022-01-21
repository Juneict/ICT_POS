@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                        <h4 class="card-header" style="background:#008B8B;color:#ffff"><marquee behavior="" direction="">Welcome to ICT POS System</marquee></h4>

                        <div class="card-body">
                            
                                {{ __('You are logged in!')}}
                        </div>
                    
            </div>
            
        </div>
        <div class="col-md-3">
                <div class="card">
                                <div class="card-header">{{ __('Dashboard') }}</div>

                                <div class="card-body">
                                    
                                        {{ __('You are logged in!')}}
                                </div>
                            
                </div>
        </div>
    </div>
</div>


@endsection
