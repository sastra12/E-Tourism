@extends('layouts.master')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <h5 class="card-header">Update Pemesan</h5>
              <div class="card-body">
                  <form action="{{ route('reservation.update',['id' => $item->id]) }}" method="POST">
                    @csrf
                      <div class="form-group">
                          <label for="nama_pemesan">Nama Pemesan</label>
                          <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" name="nama_pemesan" value="{{ $item->nama_pemesan }}">
                          @error('nama_pemesan')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputState">Jenis Kelamin</label>
                        <select id="inputState" class="form-control" name="jenis_kelamin">
                          <option value="LAKI-LAKI" {{ $item->jenis_kelamin == 'LAKI-LAKI' ? "selected" : '' }}>LAKI-LAKI</option>
                          <option value="PEREMPUAN" {{ $item->jenis_kelamin == 'PEREMPUAN' ? "selected" : '' }}>PEREMPUAN</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" value="{{ $item->nik }}" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik">
                        @error('nik')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputState">Type Tour</label>
                        <select id="inputState" class="form-control" name="type_tour">
                          <option value="Ekonomi" {{ $item->type_tour == 'Ekonomi' ? "selected" : '' }}>Ekonomi</option>
                          <option value="Bisnis" {{ $item->type_tour == 'Bisnis' ? "selected" : '' }}>Bisnis</option>
                          <option value="Eksekutif" {{ $item->type_tour == 'Eksekutif' ? "selected" : '' }}>Eksekutif</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" value="{{ $item->tanggal_perjalanan }}" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
                        @error('tanggal')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="durasi_menginap">Durasi Menginap</label>
                        <input type="text" value="{{ $item->durasi_menginap }}" class="form-control @error('durasi_menginap') is-invalid @enderror" id="durasi_menginap" name="durasi_menginap">
                        @error('durasi_menginap')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputState">Makanan</label>
                        <select id="inputState" class="form-control" name="makanan">
                          <option value="1"  {{ $item->makanan == 1 ? "selected" : '' }}>Ya</option>
                          <option value="0"  {{ $item->makanan == 0 ? "selected" : '' }}>Tidak</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="ACC"  {{ $item->status == 'ACC' ? "selected" : '' }}>ACC</option>
                          <option value="PENDING"  {{ $item->status == 'PENDING' ? "selected" : '' }}>PENDING</option>
                        </select>
                    </div>
                      <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection