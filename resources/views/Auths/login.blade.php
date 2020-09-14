@extends('layouts.auth')

@section('content')
    <div class="row no-gutters">
        <div class="col-md-6 text-white bg-primary">
            <img src="{{ url('images') }}/kantin.png" width="500" class="">
        </div>
        <div class="col-md-6 bg-white kanan">
            <div class="row no-gutters">
                <div class="col-md-7 form">
                    <div class="text-center">
                        <p class="h3 text-gray-900 mb-4">Halaman Login</p>
                    </div>
                    
                    <form class="user" method="post" action="{{ url('postlogin') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="">Create an Account!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection