@extends('frontend.body.frontend-master')
@section('content') 
    <main id="main">
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mt-3">
	                    <h4 class="">Sign in</h4>
	                    <p class="">Hello, Welcome to your account.</p>
	                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf
		                    <div class="form-group mb-3">
		                        <label class="info-title" for="exampleInputEmail1">Email</label>
		                        <input type="email" name="email" id="name" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Your Email" required>
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
		                    </div>
	  	                    <div class="form-group mb-3">
	                            <label class="info-title" for="exampleInputPassword1">Password</label>
	                            <input type="password" name="password" id="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" placeholder="Password" required>
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
		                    </div>
		                    <div class="radio outer-xs mb-3">
	  	                        <a href="{{ route('password.request') }}" class="forgot-password pull-right">
                                      Forgot your Password?
                                </a>
		                    </div>
	  	                    <button type="submit" class="btn-upper btn btn-success checkout-page-button">Login</button>
	                    </form>		
                        <div class="mt-1 text-center">
                            <p class="text title-tag-line">
                                Don't have an account ? 
                                <a href="{{ route('register') }}">
                                    Register
                                </a>
                            </p>
                        </div>			
                    </div>
                    <div class="col-md-12 col-lg-4"></div>
                </div>
                <br><br><br><br><br><br><br><br><br>
            </div>
        </section>
    </main>
@endsection