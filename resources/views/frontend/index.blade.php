@extends('frontend.body.frontend-master')
@section('content')
<div class="intro intro-carousel swiper position-relative">
  <div class="swiper-wrapper">
  @foreach ($destinations as $item)
    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(frontend/assets/images/Pantai-Biduk-Biduk.jpg)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
              <div class="intro-body">
                <p class="intro-title-top">{{ $item->village->district->regency->province->name }}, {{ $item->village->district->regency->name }}
                  <br> {{ $item->village->district->name }}, {{ $item->village->name }}</p>
                </p>
                <h1 class="intro-title mb-4 ">
                  <span class="color-b">{{ $item->destinationtype->name }}</span>
                  <br> {{ $item->name }}
                </h1>
                <p class="intro-subtitle intro-price">
                  <a href="#">
                    <span class="price-a">Rp {{ $item->price }}</span>
                  </a>
                </p>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  </div>
  <div class="swiper-pagination"></div>
</div>
<main id="main">
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="bi bi-cart"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Transaksi</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Transaksi dapat dilakukan dengan berbagai cara tanpa ada batasan tiap harinya, sehingga anda dapat melakukan booking sesukanya.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="bi bi-calendar4-week"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Jadwal</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Anda dapat memilih jadwal sesuai dengan yang anda inginkan meskipun dilakukan jauh-jauh hari sekalipun.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
              </div>
              <div class="card-title-c align-self-center">
                  <h2 class="title-c">Booking</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Fitur booking yang mudah digunakan dengan tampilan sederhana dan mudah dipahami.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Paket Wisata</h2>
            </div>
            <div class="title-link">
              <a href="destinations-packages">Semua paket
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="property-carousel" class="swiper">
        <div class="swiper-wrapper">

          @foreach ($packages as $item)
          <div class="carousel-item-b swiper-slide">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{ $item->thumbnail }}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="/destinations-packages/{{ $item->id }}">{{ $item->name }}</a>
                        <br />{{ $item->day }} Hari {{ $item->night }} Malam
                      </a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">{{ $item->price }}</span>
                    </div>
                    <a href="/destinations-packages/{{ $item->id }}" class="link-a">Lihat selengkapnya
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Wisata</h4>
                        <span>{{ count($item->destinations) }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Penginapan</h4>
                        <span>1</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Transport</h4>
                        <span>{{ count($item->transportations) }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->
          @endforeach

        </div>
      </div>
      <div class="propery-carousel-pagination carousel-pagination"></div>
    </div>
  </section>

  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Wisata</h2>
            </div>
            <div class="title-link">
              <a href="/destinations">Semua wisata
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="news-carousel" class="swiper">
        <div class="swiper-wrapper">
          @foreach ($destinations as $item)
          <div class="carousel-item-c swiper-slide">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="{{ $item->image }}" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="/destinations/{{ $item->id }}" class="category-b">{{ $item->destinationtype->name }}</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="/destinations/{{ $item->id }}">{{ $item->name }}</a>
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="news-carousel-pagination carousel-pagination"></div>
    </div>
  </section>

  <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Testimoni</h2>
            </div>
          </div>
        </div>
      </div>

      <div id="testimonial-carousel" class="swiper">
        <div class="swiper-wrapper">

          <div class="carousel-item-a swiper-slide">
            <div class="testimonials-box">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="testimonial-img">
                    <img src="frontend/assets/img/testimonial-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="testimonial-ico">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                  <div class="testimonials-content">
                    <p class="testimonial-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                      debitis hic ber quibusdam
                      voluptatibus officia expedita corpori.
                    </p>
                  </div>
                  <div class="testimonial-author-box">
                    <img src="frontend/assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                    <h5 class="testimonial-author">Albert & Erika</h5>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->
          <div class="carousel-item-a swiper-slide">
            <div class="testimonials-box">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="testimonial-img">
                    <img src="frontend/assets/img/testimonial-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div class="testimonial-ico">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                  <div class="testimonials-content">
                    <p class="testimonial-text">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                      debitis hic ber quibusdam
                      voluptatibus officia expedita corpori.
                    </p>
                  </div>
                  <div class="testimonial-author-box">
                    <img src="frontend/assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                    <h5 class="testimonial-author">Albert & Erika</h5>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End carousel item -->

        </div>
      </div>
      <div class="testimonial-carousel-pagination carousel-pagination"></div>
    </div>
  </section>
</main>
@endsection