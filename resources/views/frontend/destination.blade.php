@extends('frontend.body.frontend-master')
@section('content')
<main id="main">
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Nikmati wisata terbaik kami</h1>
            <span class="color-text-a">Pilih wisata kesukaanmu</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Wisata
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="news-grid grid">
    <div class="container">
      <div class="row">
        @foreach ($destinations as $item)
        <div class="col-md-4">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="/upload/destination/image/{{ $item->image }}" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">{{ $item->destinationtype->name }}</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="/destination/{{ $item->id }}">{{ $item->name }}</a>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="bi bi-chevron-left"></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="bi bi-chevron-right"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection