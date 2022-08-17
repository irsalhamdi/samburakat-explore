@extends('frontend.dashboard.dashboard-master')
@section('title')
    Samburakat Explore | Transaction Detail
@endsection
@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">My Transaction Detail</h2>
                <p class="dashboard-subtitle">
                    Booking Information
                </p>
            </div>
            <div class="dashboard-content">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Name
                                </p>
                                <p class="">
                                    {{ $transaction->user->name }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Phone
                                </p>
                                <p class="">
                                    {{ $transaction->user->phone }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Address
                                </p>
                                <p class="">
                                    {{ $transaction->user->address }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Account Number
                                </p>
                                <p class="">
                                    {{ $transaction->user->account_number }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Destination Type
                                </p>
                                <p class="">
                                    {{ $transaction->destination->destinationtype->name }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Village
                                </p>
                                <p class="">
                                    {{ $transaction->destination->village->name }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Address
                                </p>
                                <p class="">
                                    <a href="{{ $transaction->destination->location }}">Location</a>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Price
                                </p>
                                <p class="">
                                    {{ $transaction->destination->price }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Destination 
                                </p>
                                <p class="">
                                    {{ $transaction->destination->name }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Image
                                </p>
                                <img src="{{ asset($transaction->destination->image) }}" width="50">
                                    @php
                                        $galleries = App\Models\Gallery::where('destination_id', $transaction->destination->id)->get();
                                    @endphp
                                    @foreach ($galleries as $gallery)
                                        <img src="{{ asset($gallery->image) }}" width="50"">
                                    @endforeach
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle">
                                    Description
                                </p>
                                <p class="">
                                    {{ $transaction->destination->description }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle">
                                    Guide
                                </p>
                                <p class="">
                                    {{ $transaction->destination->guide }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Transportation 
                                </p>
                                <p class="">
                                    {{ $transaction->transportation->name }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle ">
                                    Image
                                </p>
                                <img src="{{ asset($transaction->transportation->image) }}" width="50">
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle">
                                    Price
                                </p>
                                <p class="">
                                    {{ $transaction->destination->price }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="dashboard-subtitle">
                                    Status
                                </p>
                                @if ($transaction->payment_proof == 'unpaid')
                                    <form action="{{ route('payment-proof',$transaction->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="image" name="image">
                                            <button type="submit" class="btn btn-sm btn-success mt-2 text-right">Send</button>
                                        </div>
                                    </form>
                                @else
                                <button class="btn btn-success btn-sm">
                                    Paid
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection