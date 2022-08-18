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
                <div class="row">
                  <div class="col-12">
                    <div class="col-12 mt-2">
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="pills-destination-tab" data-toggle="pill"  href="#pills-destination" role="tab" aria-controls="pills-destination" aria-selected="true">
                            Destination
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-hotel-tab" data-toggle="pill" href="#pills-hotel" role="tab" aria-controls="pills-hotel" aria-selected="false">
                           Hotel
                          </a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="pills-payment-tab" data-toggle="pill" href="#pills-payment" role="tab" aria-controls="pills-payment" aria-selected="false">
                           Payment
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active"  id="pills-destination"  role="tabpanel" aria-labelledby="pills-destination-tab" >
                              <a href="" class="card card-list d-block">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <img src="/{{ $transaction->destination->image }}" width="350" height="150" class="mb-3"/> 
                                        @php
                                            $galleries = App\Models\Gallery::where('destination_id', $transaction->id)->get();
                                        @endphp
                                        @foreach ($galleries as $gallery)
                                            <img src="{{ asset($gallery->image) }}" width="350" height="150" class="mb-3"/>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <p class="dashboard-subtitle">
                                             {{ $transaction->destination->destinationtype->name }} / {{ $transaction->destination->village->name }} / {{ $transaction->destination->name }}
                                        </p>
                                        <p style="text-align: justify">
                                            {{ $transaction->destination->description   }}
                                        </p>
                                        <button class="btn btn-sm btn-success">
                                            <i class="fas fa-delete"></i>
                                            {{ $transaction->destination->guide }}
                                        </button>
                                        <button class="btn btn-sm btn-danger ml-3">
                                            {{ $transaction->destination->price }}
                                        </button>
                                        {{-- <a class="btn btn-sm btn-primary ml-3" href="{{ $transaction->destination->location }}">
                                            Location
                                        </a> --}}
                                    </div>
                                  </div>
                                </div>
                              </a>
                        </div>
                        <div class="tab-pane fade" id="pills-hotel" role="tabpanel" aria-labelledby="pills-hotel-tab">
                            <a href="" class="card card-list d-block">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <img src="/{{ $transaction->transportation->image }}" width="350" height="150" class="mb-3"/> 
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                  </div>
                                </div>
                            </a>
                        </div>
                        <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                            <a href="" class="card card-list d-block">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <img src="/{{ $transaction->transportation->image }}" width="350" height="150" class="mb-3"/> 
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                  </div>
                                </div>
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection