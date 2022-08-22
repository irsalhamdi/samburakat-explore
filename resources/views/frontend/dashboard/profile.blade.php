@extends('frontend.dashboard.dashboard-master')
@section('title')
    Samburakat Explore | Profile
@endsection
@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">
                    Update your current profile
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Your Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Your Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address_one">Address</label>
                                                <input type="text" class="form-control" id="address"  name="address" value="{{ $user->address }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bank">Bank</label>
                                                <select name="bank" id="" class="form-control" required>
                                                    <option value="">BRI</option>
                                                    <option value="">BNI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account_number">Account Number</label>
                                                <input type="number" class="form-control" id="account_number" name="account_number" value="{{ $user->account_number }}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection