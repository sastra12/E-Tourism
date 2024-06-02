    {{-- Navbar --}}
    @if(Auth::check())
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{ route('dashboard') }}">E-Tourism Travel</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bookings.create') }}">Tambah Data Pemesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bookings.index') }}">Daftar Pemesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bookings.reservations') }}">Daftar Reservasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tourpackages.index') }}">Master Paket Wisata</a>
          </li>
        </ul>
       <a onclick="document.getElementById('logout-form').submit()" class="btn btn-primary">Logout</a>
       <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none">
        @csrf
    </form>
      </div>
    </nav>
    @else 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="">E-Tourism Travel</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('packagelist') }}">Daftar Paket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('personreservation.index') }}">Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bookinglistperson') }}">Daftar Pemesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
          </li>
        </ul>
       <a href="{{ route('login.index') }}" class="btn btn-primary">Login</a>
      </div>
    </nav>
      @if (!Route::is('packagelist'))
           <!-- Jumbotron -->
      <section class="jumbotron jumbotron-fluid hero mt-2 background-jumbotron" style="background:url('{{ asset('images/pulau merah1.jpeg') }}'); height:400px; object-fit:cover; background-repeat: no-repeat;">
        <div class="right">
            <div class="content-box">
                <h1 style="color:aliceblue">~ E-Tourism Travel ~</h1>
                <h5 style="color:aliceblue">Menyemai Naluri Petualangan Anda: Menghadirkan Perjalanan yang Tak Terlupakan Sesuai Impian dan Keinginan Anda</h5>
            </div>
        </div>
    </section>
    <!-- End Jumbotron -->
      @endif
    @endif 

@push('css')
<style>
  .background-jumbotron{
    
  }
</style>
@endpush
  