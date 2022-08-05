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
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="paket-grid.html">Paket wisata</a>
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
                {{-- <img src="/upload/destination/image/{{ $item->image }}" class="w-100 img-fluid" alt="{{ $item->image }}"> --}}
                {{ $item->image }}
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
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <div class="form-group">
                          <label class="pb-2" for="Type">Jumlah</label>
                          <input type="text" class="form-control form-control-md form-control-a" placeholder="Jumlah">
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="form-group">
                          <label class="pb-2" for="Type">Waktu</label>
                          <input type="date" class="form-control form-control-md form-control-a" placeholder="Jumlah">
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-b">Booking</button>
                        </div>
                      </li>
                    </ul>
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
                    <a href="wisata-single.html">
                      <img src="/upload/destination/image/{{ $item->image }}" class="w-100 rounded"
                        style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
                      <p class="description color-text-a mt-2">
                        {{ $item->name }}
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
              <div class="amenities-list color-text-a ">
                <img src="/upload/package/lodging/{{ $package->lodging }}" class="w-50 rounded float-left" alt="Penginapan">
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
                  <img src="upload/package/transport/{{ $item->image}}" class="w-100 rounded"
                    style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
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