@extends('admin.admin-master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row"> 
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Success Booking</h4>
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
                                        <th>Packages</th>
                                        <th>Destination</th>
                                        <th>Transportation</th>
                                        <th>Date</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->user->name}}</td>
                                        <td>{{ $booking->package->name }}</td>
                                        <td>{{ $booking->destination->name }}</td>
                                        <td>{{ $booking->transportation->name }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success">Paid</button>
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