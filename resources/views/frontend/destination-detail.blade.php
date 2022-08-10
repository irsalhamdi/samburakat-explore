@extends('frontend.body.frontend-master')
@section('content')
<main id="main">
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $destination->name }}</h1>
            <span class="color-text-a">{{ $desa->district->regency->province->name }} / {{ $desa->district->regency->name }} / {{ $desa->district->name }} / {{ $desa->name }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Wisata
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $destination->name }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="property-single nav-arrow-b">
    <div class="container">

      <div class="row">
        <div class="col-sm-12">
          <img src="/{{ $destination->image }}" alt="" class="img-fluid mb-5 w-100"
            style="object-fit: cover !important;">
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-cash">Rp</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $destination->price }}</h5>
                  </div>
                </div>
              </div>
              <div class="row pt-5">
                <div class="col-md-12">
                  <div class="card">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <label class="pb-2" for="Type">Transportation</label>
                        <select class="form-control form-select form-control-a" id="Type">
                          @foreach ($transportations as $item)
                          <option>{{ $item->name }}</option>
                          @endforeach
                        </select>
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
                    <h3 class="title-d">Deskripsi wisata</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                {!! $destination->description !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="gallery" class="gallery pt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box-d">
            <h3 class="title-d">Gallery</h3>
          </div>
        </div>
      </div>
      <div class="row g-0">
        @foreach ($destination->galleries as $gallery)
        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="{{ $gallery->image }}" class="gallery-lightbox">
              <img src="/{{ $gallery->image }}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="location" class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box-d">
            <h3 class="title-d">Lokasi</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <a href="{{ $destination->location }}" target="_blank" rel="noopener noreferrer">{{ $destination->name }}</a>
        </div>
      </div>
    </div>

  </section>
</main>
@endsection