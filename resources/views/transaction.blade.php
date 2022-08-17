@extends('dashboard')
@section('title')
    Samburakat Explore | Transactions
@endsection
@section('content')
  <div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
          <h2 class="dashboard-title">My Transactions</h2>
          <p class="dashboard-subtitle">
            See what's you have build
         </p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <div class="col-12 mt-2">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill"  href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                    Destination
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                    Destination Packages
                  </a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active"  id="pills-home"  role="tabpanel" aria-labelledby="pills-home-tab" >
                  @foreach ($transactions as $transaction)
                      <a href="{{ route('transaction-detail',$transaction->id) }}" class="card card-list d-block">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img src="/{{ $transaction->destination->image }}" class="w-50"/>
                            </div>
                            <div class="col-md-4">
                              {{ $transaction->destination->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->destination->price }}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->date }}
                            </div>
                            <div class="col-md-1 d-none d-md-block">
                              @if ($transaction->payment_proof == 'unpaid')
                                <button class="btn btn-sm btn-danger">
                                  {{ $transaction->payment_proof }}
                                </button>    
                              @else
                                <button class="btn btn-sm btn-success">
                                  {{ $transaction->payment_proof }}
                                </button>
                              @endif
                            </div>
                          </div>
                        </div>
                      </a>
                  @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  @foreach ($transactions as $transaction)
                      <a href=" class="card card-list d-block">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-1">
                              <img src="" class="w-50"/>
                            </div>
                            <div class="col-md-4">
                              {{ $transaction->name }}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->store_name }}
                            </div>
                            <div class="col-md-3">
                              {{ $transaction->created_at }}
                            </div>
                            <div class="col-md-1 d-none d-md-block">
                              <img src="/images/dashboard-arrow-right.svg" alt=""/>
                            </div>
                          </div>
                        </div>
                      </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
