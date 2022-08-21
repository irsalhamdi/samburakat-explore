@extends('frontend.body.frontend-master')
@section('content') 
    <main id="main">
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mt-3">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="info-title" for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter Your Full Name" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror" value="{{ old('name') }}"  required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <div class="form-group mb-3">
                                <label class="info-title" for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter Your Active Email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="info-title" for="phone">Phone</label>
                                <input type="number" id="phone" name="phone" placeholder="Enter Your Phone Number" class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="info-title" for="address">Address</label>
                                <input type="text" id="phone" name="address" placeholder="Enter Your Address" class="form-control unicase-form-control text-input @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="info-title" for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="info-title" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" class="form-control unicase-form-control text-input @error('password_confirmation') is-invalid @enderror" required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-success checkout-page-button">
                                Sign Up
                            </button>
                        </form>
                        <div class="mt-1 text-center">
                            <p class="text title-tag-line">
                                Already have an account ? 
                                <a href="{{ route('login') }}">
                                    Login
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4"></div>
                </div>
            </div>
        </section>
    </main>
@endsection