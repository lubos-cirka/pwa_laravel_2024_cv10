@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <ul class="mt-3">
                        <li>{{ Auth::user()->name }}</li>
                        <li>{{ Auth::user()->email }}</li>
                    </ul>

                    <hr>
                    <ul class="mt-3">
                        <li>{{ Auth::user()->firstname }}&nbsp;{{ Auth::user()->lastname }}</li>
                    </ul>
                    <hr>
                    <ul class="mt-3">
                        <li>{{ Auth::user()->full_name }}</li>
                    </ul>  
                    <hr>
                    <ul class="mt-3">
                        <li>{!! Auth::user()->full_name !!}</li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
