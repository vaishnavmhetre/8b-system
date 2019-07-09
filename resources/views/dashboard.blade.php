@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start mt-3 px-4">
            <h2>{{ __('views/dashboard.welcome', ['name' => auth()->user()->name]) }}</h2>
        </div>
        <hr>
        <div class="row justify-content-center mt-4">
            <div class="col-12 px-4">
                <h4>{{ __('views/dashboard.recently_updated_8bs') }}</h4>
                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
