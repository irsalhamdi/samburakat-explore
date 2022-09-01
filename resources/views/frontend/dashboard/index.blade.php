@extends('frontend.dashboard.dashboard-master')
@section('title')
    Samburakat Explore | Dashboard
@endsection
@section('content')
    @php
        $transaction = App\Models\Booking::where('user_id', Auth::user()->id)->get();
        $destination = App\Models\Booking::where('user_id', Auth::user()->id)->where('destination_id', '>', 0)->get();
        $package = App\Models\Booking::where('user_id', Auth::user()->id)->where('package_id', '>', 0)->get();
    @endphp
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                    Look what you have made today!
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Transactions
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ count($transaction) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Destinations
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ count($destination) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Destination Packages
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ count($package) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection