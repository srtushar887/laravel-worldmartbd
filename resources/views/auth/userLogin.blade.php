@extends('layouts.frontend')
@section('front')
    <section class="gry-bg py-5">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center px-35 pt-5">
                                <h1 class="heading heading-4 strong-500">
                                    Login to your account.
                                </h1>
                            </div>
                            <div class="px-5 py-3 py-lg-4">
                                <div class="">
                                    <form class="form-default" role="form" action="{{route('login')}}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="text" class="form-control  @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Email" name="email" id="email">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-user"></i>
                                                </span>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-lock"></i>
                                                </span>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="../password/reset.html" class="link link-xs link--style-3">Forgot password?</a>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">Login</button>
                                        </div>
                                    </form>
                                    <div class="or or--1 mt-3 text-center">
                                        <span>or</span>
                                    </div>
                                    <div>
                                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                            <i class="icon fa fa-facebook"></i> Login with Facebook
                                        </a>
                                        <a href="" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                            <i class="icon fa fa-google"></i> Login with Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    Need an account? <a href="registration.html" class="strong-600">Register Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
