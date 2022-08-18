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
                                  <p class="dashboard-subtitle">
                                    Destination
                                  </p>
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
                              <div class="row">
                                <div class="col-md-6">
                                  <p class="dashboard-subtitle">
                                    Transportation
                                  </p>
                                  <img src="/{{ $transaction->transportation->image }}" width="350" height="150" class="mb-3"/> 
                                </div>
                                <div class="col-md-6"></div>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                            <a href="" class="card card-list d-block">
                              @if ($transaction->payment_proof == 'unpaid')
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      Hello, {{ Auth::user()->name }}
                                      <h2>
                                        Rp. {{ $transaction->total_price }}
                                      </h2>
                                      <p class="dashboard-subtitle" style="text-align: justify">
                                        Please, send your payment proof ! <br>  
                                        # {{ $transaction->code }}
                                      </p>
                                    </div>
                                    <div class="col-md-6">
                                      <form action="{{ route('payment-proof',$transaction->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mt-3">
                                          <h5>Image</h5>
                                          <div class="controls">
                                              <input type="file" name="image" class="form-control" required="" id="image">
                                          </div>
                                        </div>
                                        <img id="showImage" src="{{ url('upload/default.jpg') }}" style="width: 100px; height: 100px;" class="mb-3">
                                        <div class="col text-right">
                                          <button type="submit" class="btn btn-success px-5">
                                              Submit
                                          </button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              @else
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center"> Transaction Processed</h2>
                                        <p class="text-center">
                                          Please wait confirmation email from us !
                                        </p>
                                    </div>
                                  </div>
                                </div>
                              @endif
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
@push('addon-script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);	
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>
@endpush
