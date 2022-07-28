@extends('frontend.body.frontend-master')
@section('content')
<main id="main">
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Derawan Trip</h1>
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
                Derawan Trip
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
              <div class="carousel-item-b swiper-slide w-100">
                <img src="assets/images/wisata/1.png" class="w-100 img-fluid" alt="">
              </div>
              <div class="carousel-item-b swiper-slide w-100">
                <img src="assets/images/wisata/2.png" class="w-100 img-fluid" alt="">
              </div>
              <div class="carousel-item-b swiper-slide w-100">
                <img src="assets/images/wisata/3.png" class="w-100 img-fluid" alt="">
              </div>
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
                    <h5 class="title-c">3.990.000</h5>
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
                <p class="description color-text-a">
                  Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di
                  kepulauan ini terdapat sejumlah objek wisata bahari menawan, salah satunya Taman Bawah Laut yang
                  diminati wisatawan mancanegara terutama para penyelam kelas dunia
                </p>
                <p class="description color-text-a no-margin">
                  Sedikitnya ada empat pulau yang terkenal di kepulauan tersebut, yakni Pulau Maratua, Derawan,
                  Sangalaki, dan Kakaban yang ditinggali satwa langka penyu hijau dan penyu sisik.
                </p>
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
                  <div class="col-md-6">
                    <a href="wisata-single.html">
                      <img src="assets/images/Pulau-Derawan-Kalimantan-1.jpg" class="w-100 rounded"
                        style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
                      <p class="description color-text-a mt-2">
                        Derawan
                      </p>
                    </a>
                  </div>
                  <div class="col-md-6">
                    <a href="wisata-single.html">
                      <img src="assets/images/sangalaki.jpg" class="w-100 rounded mt-1"
                        style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
                      <p class="description color-text-a mt-2">
                        Maratua
                      </p>
                    </a>
                  </div>
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
                <img src="assets/images/penginapan.jpg" class="w-50 rounded float-left" alt="Penginapan">
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Transport</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <img src="assets/images/spedboat.jpg" class="w-100 rounded"
                    style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
                </div>
                <div class="col-md-6">
                  <img src="assets/images/mobil-elf.jpg" class="w-100 rounded"
                    style="height: 15rem; margin-right: 1rem;" alt="Penginapan">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection