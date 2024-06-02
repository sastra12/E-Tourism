@extends('layouts.master')

@section('content')
<div class="col-12 mt-5">
  @if ($item->durasi_menginap > 3)
    <h3>Selamat Anda Mendapatkan Diskon 10%</h3>
  @endif
  <p style="color: black">Nama Pemesan : {{ $item->nama_pemesan }}</p>
  <p style="color: black">Nomor Identitas : {{ $item->nik }}</p>
  <p style="color: black">Jenis Kelamin {{ $item->jenis_kelamin }}</p>
  <p style="color: black">Tipe Tour : {{ $item->type_tour }}</p>
  <p style="color: black">Tanggal : {{ $item->tanggal_perjalanan }}</p>
  <p style="color: black">Durasi Menginap : {{ $item->durasi_menginap }} Hari</p>
  <p style="color: black">Termasuk Breakfast : {{ ($item->makanan == 1 ? 'YA' : 'NO') }}</p>
  <p style="color: black">Status : {{ $item->status }}</p>
</div>
@endsection