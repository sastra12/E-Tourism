@extends('layouts.master')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <h5 class="card-header">Tambah Data Pemesanan</h5>
              <div class="card-body">
                  <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                          <label for="nama_pemesan">Nama Pemesan</label>
                          <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
                          @error('nama_pemesan')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                          <option value="LAKI-LAKI">LAKI-LAKI</option>
                          <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik">
                        @error('nik')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="type_tour">Type Tour</label>
                        <select id="type_tour" class="form-control" name="type_tour">
                          <option value="Ekonomi">Ekonomi</option>
                          <option value="Bisnis">Bisnis</option>
                          <option value="Eksekutif">Eksekutif</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
                        @error('tanggal')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="durasi_menginap">Durasi Menginap</label>
                        <input type="text" class="form-control @error('durasi_menginap') is-invalid @enderror" id="durasi_menginap" name="durasi_menginap" value="{{ old('durasi_menginap') }}">
                          @error('durasi_menginap')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="makanan">Makanan</label>
                        <select id="makanan" class="form-control" name="makanan">
                          <option value="1">Ya</option>
                          <option value="0">Tidak</option>
                        </select>
                      </div>
                
                      <div class="d-flex justify-content-between">
                        <h6>Total Tagihan:</h6>
                        <h6 class="total_tagihan"></h6>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@push('script')
<script>
  // let jumlah_peserta_input = document.getElementById("jumlah_peserta");
  // console.log(jumlah_peserta_input);
  // jumlah_peserta_input.addEventListener('change',function(e){
  //   console.log(e)
  // })
  // jumlah_peserta_input.addEventListener('change',function(e){
  //   console.log(e)
  // })
  function updateTagihan() {
  let hotel = document.querySelector("select[name='hotel']").value;
  let transportasi = document.querySelector("select[name='transportasi']").value;
  let makanan = document.querySelector("select[name='makanan']").value;
  let jumlah_peserta_input = document.getElementById("jumlah_peserta").value;
  console.log(jumlah_peserta_input);
  hotel = (hotel == 1 ? 1000000 : 0);
  transportasi = (transportasi == 1 ? 1200000 : 0);
  makanan = (makanan == 1 ? 500000 : 0);

  const paket_perjalanan = hotel + transportasi + makanan;
  const total_tagihan = jumlah_peserta_input * paket_perjalanan;

  const paketPerjalananElement = document.querySelector('.paket_perjalanan');
  const totalTagihanElement = document.querySelector('.total_tagihan');

  paketPerjalananElement.textContent = paket_perjalanan;
  totalTagihanElement.textContent = total_tagihan;
}
document.querySelectorAll("select[name='hotel'],select[name='transportasi'],select[name='makanan'],select[name='jumlah_peserta']").forEach(function(element) {
  element.addEventListener('change', updateTagihan);
});


updateTagihan();
</script>
@endpush
