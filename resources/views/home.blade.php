@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ __('You are logged in!') }}    {{ __('Dashboard') }}<strong class="float-right">Hello, {{Auth::user()->name}}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('profile.edit',Auth::user()->id) }}" class="btn btn-primary">Your Profile</a>   




                   


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
