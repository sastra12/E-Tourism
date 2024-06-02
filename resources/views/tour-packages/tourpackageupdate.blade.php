@extends('layouts.master')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <h5 class="card-header">Edit Data Paket Wisata</h5>
              <div class="card-body">
                  <form action="{{ route('tourpackages.update',['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                          <label for="nama_paket">Nama Paket Pariwisata</label>
                          <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket" value="{{ $item->package_name }}">
                          @error('nama_paket')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="destinasi">Destinasi</label>
                        <input type="text" class="form-control @error('destinasi') is-invalid @enderror" id="destinasi" name="destinasi" value="{{ $item->destinations }}">
                        @error('destinasi')
                          <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="gambar">Gambar</label>
                      <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ $item->image }}">
                      <img width="50%" src="" alt="" id="image" class="mt-2">
                      @error('gambar')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3" name="deskripsi">{{ $item->description }}</textarea>
                    @error('deskripsi')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
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
  document.getElementById('gambar').onchange = function(e) {
      console.log(this);
      console.log(e);
      let src = URL.createObjectURL(this.files[0]);
      console.log(src);
      document.getElementById('image').src = src;
  }
</script>
@endpush