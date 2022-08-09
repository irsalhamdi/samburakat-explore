<div class="click-closed"></div>

<div class="box-collapse">
  <div class="title-box-d">
    <h3 class="title-d">Cari wisata</h3>
  </div>
  <span class="close-box-collapse right-boxed bi bi-x"></span>
  <div class="box-collapse-wrap form">
    <form class="form-a">
      <div class="row">
        <div class="col-md-12 mb-2">
          <div class="form-group">
            <label class="pb-2" for="Type">Nama wisata</label>
            <input type="text" class="form-control form-control-lg form-control-a" placeholder="Nama wisata...">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group mt-3">
            <label class="pb-2" for="Type">Provinsi</label>
            <select class="form-control form-select form-control-a" id="Type">
              <option>--provinsi--</option>
              <option>For Rent</option>
              <option>For Sale</option>
              <option>Open House</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group mt-3">
            <label class="pb-2" for="city">Kabupaten</label>
            <select class="form-control form-select form-control-a" id="city">
              <option>--kabupaten--</option>
              <option>Alabama</option>
              <option>Arizona</option>
              <option>California</option>
              <option>Colorado</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group mt-3">
            <label class="pb-2" for="bedrooms">Kecamatan</label>
            <select class="form-control form-select form-control-a" id="bedrooms">
              <option>--kecamatan--</option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group mt-3">
            <label class="pb-2" for="garages">Desa</label>
            <select class="form-control form-select form-control-a" id="garages">
              <option>--desa--</option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group mt-3">
            <label class="pb-2" for="bathrooms">Tipe</label>
            <select class="form-control form-select form-control-a" id="bathrooms">
              <option>--tipe--</option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
            </select>
          </div>
        </div>
        <div class="col-md-12 mt-3">
          <button type="submit" class="btn btn-b">Cari wisata</button>
        </div>
      </div>
    </form>
  </div>
</div>

<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ route('home') }}">Samburakat<span class="color-b">Explore</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" href="/">Beranda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('destination-packages') ? 'active' : ''}}" href="{{ route('destination-packages') }}">Paket</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('destinations') ? 'active' : ''}}" href="{{ route('destinations') }}">Wisata</a>
          </li>

        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
</nav>