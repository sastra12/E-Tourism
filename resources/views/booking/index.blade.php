@extends('layouts.master')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ Session::get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<p style="color: black">Harga Paket Perjalanan</p>
<p style="color: black">Jika Type Tour Menggunakan Kelas Ekonomi Maka Biayanya: Rp.1000.000</p>
<p style="color: black">Jika Type Tour Menggunakan Kelas Bisnis Maka Biayanya: Rp.1500.000</p>
<p style="color: black">Jika Type Tour Menggunakan Kelas Eksekutif Maka Biayanya: Rp.2000.000</p>
<p style="color: black">Jika Durasi Menginap Lebih Tiga Hari maka, mendapat diskon 10% </p>
<p style="color: black">Jika Dengan Makanan Maka Biayanya: Rp.80.000</p>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th style="text-align: center;" scope="col">Nama</th>
        <th style="text-align: center;" scope="col">Jenis Kelamin</th>
        <th style="text-align: center;" scope="col">NIK</th>
        <th style="text-align: center;" scope="col">Type Tour</th>
        <th style="text-align: center;" scope="col">Tanggal</th>
        <th style="text-align: center;" scope="col">Menginap</th>
        <th style="text-align: center;" scope="col">Makan</th>
        <th style="text-align: center;" scope="col">Tagihan</th>
        <th style="text-align: center;" scope="col">Status</th>
        <th style="text-align: center;" scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item )
      <tr>
        <td style="text-align: center;">{{ $item->nama_pemesan }}</td>
        <td style="text-align: center;">{{ $item->jenis_kelamin }}</td>
        <td style="text-align: center;">{{ $item->nik }}</td>
        <td style="text-align: center;">{{ $item->type_tour }}</td>
        <td style="text-align: center;">{{ $item->tanggal_perjalanan  }}</td>
        <td style="text-align: center;">{{ $item->durasi_menginap  }}</td>
        <td style="text-align: center;">{{ ($item->makanan == 1 ? 'YA' : 'NO') }}</td>
        <td style="text-align: center;">{{ $item->total_tagihan }}</td>
        <td style="text-align: center;">{{ $item->status }}</td>
        <td style="text-align: center;
        display: flex;
        gap: 2px;">
        <a class="btn btn-info btn-sm" href="{{ route('bookings.adminbookingupdate',['id' => $item->id]) }}">Edit</a>
        <a onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm" href="{{ route('bookings.destroy', ['id' => $item->id]) }}">Hapus</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection