@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            
        </div>
        <div class="col-sm-8">
            <div class="card shadow-md">
                <div class="card-header">
                    <h1 class='text-center'>Internship Task</h1>
                </div>
                <div class="card-body">

                     <div class="card-title text-primary text-center">
                       This App developed By Er. Amar kumar
                     </div>
                    
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('login') }}" class="btn btn-dark">User Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">New Registration</a>

                        
                    
                </div>
            
            </div>
        </div>
        <div class="col-sm-2">
            
        </div>
    </div>
</div>
@endsection