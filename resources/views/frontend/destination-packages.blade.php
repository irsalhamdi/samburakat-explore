@extends('frontend.body.frontend-master')
@section('content')
<main id="main">
  <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Nikmati paket wisata terbaik kami</h1>
              <span class="color-text-a">Pilih paket wisatamu</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Paket wisata
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
  </section>

  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        @foreach ($packages as $item)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="frontend/assets/images/Pulau-Derawan-Kalimantan-1.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="paket-single.html">{{ $item->name }}
                      <br />3 Hari 2 Malam</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Rp 499.000</span>
                  </div>
                  <a href="/destination-packages/detail" class="link-a">Lihat selengkapnya
                    <span class="bi bi-chevron-right"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Wisata</h4>
                      <span>3</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Penginapan</h4>
                      <span>1</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Kuliner</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Transport</h4>
                      <span>Elf Isuzu</span>
                    </li>
                  </ul>
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