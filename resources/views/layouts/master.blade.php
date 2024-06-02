<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  @stack('css')
  <title>Document</title>
</head>
<body>
  <div class="container">
  {{-- Navbar --}}
  @includeIf('layouts.navbar')
  </div>

  {{-- Content--}}
  <div class="container mt-5">
    @yield('content')
  </div>

  {{-- Service --}}
    @if (!Auth::check())
    <section id="service" class="mt-5 pt-5 pb-5 text-center">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <h3>Keuntungan Menggunakan Layanan Kami</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-service">
                        <div class="card-body text-start">
                            <i class="fas fa-award"></i>
                            <h5 class="card-title">Kemudahan Reservasi</h5>
                            <p style="color: black;
                            opacity:70%; text-align: center;" class="card-text">Kami menyediakan platform yang mudah digunakan untuk melakukan pemesanan secara online atau melalui agen kami. Ini membuat proses reservasi menjadi lebih cepat dan efisien bagi pelanggan kami.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service">
                        <div class="card-body text-start">
                            <i class="fas fa-dollar-sign mb-2"></i>
                            <h5 class="card-title">Paket Beragam</h5>
                            <p style="color: black;
                            opacity:70%; text-align: center;"  class="card-text">Kami menawarkan berbagai paket liburan yang dapat disesuaikan dengan preferensi dan anggaran pelanggan. Dari liburan romantis hingga petualangan ekstrem, kami memiliki sesuatu untuk semua orang</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service">
                        <div class="card-body text-start">
                            <i class="far fa-check-circle"></i>
                            <h5 class="card-title">Pelayanan Pelanggan Terbaik</h5>
                            <p style="color: black;
                            opacity:70%; text-align: center;"  class="card-text">Staf kami terlatih dengan baik dan siap memberikan bantuan dan jawaban atas pertanyaan pelanggan dengan ramah dan profesional. Kami memastikan setiap pelanggan merasa dihargai dan didukung selama perjalanan mereka</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service">
                        <div class="card-body text-start">
                            <i class="fas fa-bolt"></i>
                            <h5 class="card-title">Akses ke Destinasi Eksklusif</h5>
                            <p style="color: black;
                            opacity:70%; text-align: center;"  class="card-text">Melalui kemitraan kami dengan penyedia layanan wisata terkemuka, kami memberikan akses eksklusif ke destinasi wisata populer dan tersembunyi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service">
                        <div class="card-body text-start">
                            <i class="fas fa-dice-d6"></i>
                            <h5 class="card-title">Keselamatan dan Keamanan</h5>
                            <p style="color: black;
                            opacity:70%; text-align: center;"  class="card-text">Kami memprioritaskan keselamatan dan keamanan pelanggan kami. Dari pemilihan penyedia layanan yang terpercaya hingga perencanaan rute perjalanan yang aman, kami berkomitmen untuk memastikan bahwa pelanggan kami dapat menikmati liburan mereka tanpa khawatir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-service">
                        <div class="card-body text-start">
                            <i class="far fa-clock"></i>
                            <h5 class="card-title">Layanan 24/7</h5>
                            <p style="color: black;
                            opacity:70%; text-align: center;"  class="card-text">Kami menyediakan layanan dukungan pelanggan 24 jam sehari, 7 hari seminggu. Ini memastikan bahwa pelanggan kami memiliki akses langsung ke bantuan dan dukungan kapan pun mereka membutuhkannya, baik sebelum, selama, maupun setelah perjalanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
 
    <!-- End Service -->

  {{-- Footer --}}
<div>
  @includeIf('layouts.footer')
</div>
 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    @stack('script')
</body>
</html>