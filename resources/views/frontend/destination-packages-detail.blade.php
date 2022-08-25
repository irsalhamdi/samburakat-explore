@extends('frontend.body.frontend-master')
@section('content')
<main id="main">
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $package->name }}</h1>
            <span class="color-text-a">Kalilmantan Timur / Berau</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('destinations-packages') }}">Paket wisata</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $package->name }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div id="property-single-carousel" class="swiper">
            <div class="swiper-wrapper">
              @foreach ($package->destinations as $item)
              <div class="carousel-item-b swiper-slide w-100">
                <img src="/{{ $item->destination->image }}" class="w-100 img-fluid" alt="{{ $item->destination->image }}">
              </div>
              @endforeach
            </div>
          </div>
          <div class="property-single-carousel-pagination carousel-pagination"></div>
        </div>
      </div>

      <div class="row pt-5">
        <div class="col-sm-12">
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-cash">Rp</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $package->price }}</h5>
                  </div>
                </div>
              </div>
              <div class="row pt-5">
                <div class="col-md-12">
                  <div class="card">
                    <form method="POST" action="{{ route('booking') }}">
                      @csrf
                      <input type="hidden" name="package_id" value="{{ $package->id }}" required>
                      <input type="hidden" name="package_transportation_id" value="">
                      <input type="hidden" name="hotel_id" value="{{ $package->hotel_id }}">
                      <input type="hidden" name="total_price" value="{{ $package->price }}">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">
                            <div class="form-group">
                              <label class="pb-2" for="Type">Waktu</label>
                              <input type="date" name="date" class="form-control form-control-md form-control-a" placeholder="Jumlah">
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-b">Booking</button>
                            </div>
                          </li>
                        </ul>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Deskripsi paket wisata</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                {!! $package->description !!}
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Wisata Tujuan</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <div class="row">
                  @foreach ($package->destinations as $item)
                  <div class="col-md-6">
                    <a href="/destinations/{{ $item->id }}">
                      <img src="/{{ $item->destination->image }}" class="w-100 rounded" style="height: 15rem; margin-right: 1rem;" alt="{{ $item->name }}">
                      <p class="description color-text-a mt-2">
                        {{ $item->destination->name }}
                      </p>
                    </a>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Penginapan</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach ($package->hotel->galleries as $item)
                <div class="col-md-6">
                  <img src="/{{ $item->image}}" class="w-100 rounded" style="height: 15rem; margin-right: 1rem;" alt="{{ $item->image}}">
                </div>
                @endforeach
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Transport</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach ($package->transportations as $item)
                <div class="col-md-6">
                  <img src="/{{ $item->transportation->image}}" class="w-100 rounded" style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection