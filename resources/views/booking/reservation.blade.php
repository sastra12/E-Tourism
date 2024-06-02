@extends('layouts.master')

@section('content')
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th style="text-align: center;" scope="col">Nama</th>
        <th style="text-align: center;" scope="col">Jenis Kelamin</th>
        <th style="text-align: center;" scope="col">NIK</th>
        <th style="text-align: center;" scope="col">Type Tour</th>
        <th style="text-align: center;" scope="col">Tanggal</th>
        <th style="text-align: center;" scope="col">Durasi Menginap</th>
        <th style="text-align: center;" scope="col">Makanan</th>
        <th style="text-align: center;" scope="col">Total Tagihan</th>
        <th style="text-align: center;" scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item )
      <tr>
        <td style="text-align: center;">{{ $item->nama_pemesan }}</td>
        <td style="text-align: center;">{{ $item->jenis_kelamin }}</td>
        <td style="text-align: center;">{{ $item->nik }}</td>
        <td style="text-align: center;">{{ $item->type_tour  }}</td>
        <td style="text-align: center;">{{ $item->tanggal_perjalanan }}</td>
        <td style="text-align: center;">{{ $item->durasi_menginap }}</td>
        <td style="text-align: center;">{{ ($item->makanan == 1 ? 'YA' : 'NO') }}</td>
        <td style="text-align: center;">{{ $item->total_tagihan }}</td>
        <td style="text-align: center;">
          <a href="{{ route('reservation.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection