@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row"> 
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Pending Booking</h4>
                            <span class="badge badge-pill badge-danger">    
                                {{ count($bookings) }} 
                            </span>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Destination</th>
                                        <th>Date</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->user->name}}</td>
                                        @if ($booking->package_id !== null)
                                            <td>{{ $booking->package->name }}</td>
                                        @else
                                            <td>{{ $booking->destination->name }}</td>
                                        @endif
                                        <td>{{ $booking->date }}</td>
                                        <td>
                                            @if ($booking->payment_proof === 'unpaid')
                                                <span class="btn btn-sm btn-danger">Unpaid</span>
                                            @else
                                                <img src="{{ asset($booking->image) }}" style="width: 120px; height: 40px;">
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