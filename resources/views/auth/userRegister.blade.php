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
                                    Register to your account.
                                </h1>
                            </div>

                            <div class="px-5 py-3 py-lg-4">
                                <div class="">
                                    <form class="form-default" role="form" action="{{route('register')}}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="text" class="form-control form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  placeholder="Full Name" name="name" id="">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-user"></i>
                                                </span>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="text" class="form-control form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  placeholder="Email" name="email" id="email">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-envelope"></i>
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
                                                <input type="text" class="form-control form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"  placeholder="Phone" name="phone" id="email">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-phone"></i>
                                                </span>
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" name="password" id="password">
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

                                        <div class="form-group">
                                            <div class="input-group input-group--style-1">
                                                <input type="password" class="form-control " placeholder="Confirm Password" name="password_confirmation" id="password">
                                                <span class="input-group-addon">
                                                    <i class="text-md la la-lock"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="text-center px-35 pb-3">
                                <p class="text-md">
                                    Already have an account?? <a href="registration.html" class="strong-600">Login Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
