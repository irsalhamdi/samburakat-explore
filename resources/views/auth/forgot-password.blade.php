{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('frontend.body.frontend-master')
@section('content')
    <main id="main">
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mt-3">
                        <h4>
                            {{ __('Forgot your password ?') }}
                        </h4>
                        <p style="text-align: justify">
                            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="info-title" for="email" value="{{ __('Email') }}">Email</label>
                                <input type="email" name="email" id="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-success checkout-page-button">Send</button>
                        </form>				
                    </div>
                    <div class="col-md-12 col-lg-4"></div>
                </div>
                <br><br><br><br><br><br><br><br><br>
            </div>
        </section>
    </main>
@endsection