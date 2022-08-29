@extends('frontend.body.frontend-master')
@section('content') 
    <main id="main">
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mt-3">
	                    <h4 class="">Email Verification</h4>
	                    <p class="justify-around">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>	
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif	
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
	  	                    <button type="submit" class="btn-upper btn btn-success checkout-page-button">Resend Verification Email</button>
	                    </form>	
                    </div>
                    <div class="col-md-12 col-lg-4"></div>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </section>
    </main>
@endsection
