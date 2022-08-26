@extends('admin.admin-master')
@section('admin')
    @php
        $destinations = App\Models\Destination::latest()->get();
        $packages = App\Models\Package::latest()->get();
        $bookings = App\Models\Booking::with('user', 'destination', 'transportation')->whereNotNull('destination_id')->get();
        $revenue = App\Models\Booking::sum('total_price');
        $users = App\Models\User::latest()->get();
    @endphp
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-map"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">
                                    Destinations
                                </p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ count($destinations) }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-package"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">
                                    Packages
                                </p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ count($packages) }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-cart"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">
                                    Booking
                                </p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ count($bookings) }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">							
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-book"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">
                                    Money
                                </p>
                                <h3 class="text-white mb-0 font-weight-500">
                                    {{ $revenue }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                New Bookings
                                <small class="subtitle">More than {{ count($users) }} new members</small>
                            </h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>
                                        <tr class="text-uppercase bg-lightest">
                                            <th style="min-width: 250px"><span class="text-white">Name</span></th>
                                            <th style="min-width: 150px"><span class="text-fade">Payment</span></th>
                                            <th style="min-width: 100px"><span class="text-fade">Address</span></th>
                                            <th style="min-width: 100px"><span class="text-fade">Destination</span></th>
                                            <th style="min-width: 130px"><span class="text-fade">Payment Proof</span></th>
                                            <th style="min-width: 120px"><span class="text-fade">Transportation</span></th>
                                            <th style="min-width: 120px"><span class="text-fade">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr>										
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 mr-20">
                                                            <div class="bg-img h-50 w-50">
                                                                <img src="{{ (!empty($booking->user->profile_photo_path)) ? asset($booking->user->profile_photo_path) : url('upload/default.jpg')}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">{{ $booking->user->name }}</a>
                                                            <span class="text-fade d-block">{{ $booking->user->phone }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        {{ $booking->payment_proof }}
                                                    </span>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $booking->total_price }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        {{ $booking->user->address }}
                                                    </span>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $booking->user->address }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-fade font-weight-600 d-block font-size-16">
                                                        {{ $booking->destination->name }}
                                                    </span>
                                                    <span class="text-white font-weight-600 d-block font-size-16">
                                                        {{ $booking->destination->guide }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($booking->payment_proof == 'unpaid')
                                                        <span class="badge badge-primary-light badge-lg">Not Available</span>
                                                    @else
                                                        <img src="{{ (!empty($booking->image)) ? asset($booking->image) : url('upload/default.jpg')}}" width="50">
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <a href="#" class="waves-effect waves-light mx-5">
                                                        {{ $booking->transportation->name }}    
                                                    </a>
                                                    <img src="{{ (!empty($booking->transportation->image)) ? asset($booking->transportation->image) : url('upload/default.jpg')}}" width="50">
                                                </td>
                                                <td>
                                                    @if ($booking->payment_proof == 'unpaid')
                                                        <a href="" class="badge badge-danger-light badge-lg">Approve</a>
                                                    @else
                                                        <button class="badge badge-success-light badge-lg">Success</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </section>
    </div>    
@endsection
