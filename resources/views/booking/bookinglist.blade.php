@extends('layouts.master')

@section('content')
<div class="col-12 mt-5">
  @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="text-align: center;" scope="col">No</th>
          <th style="text-align: center;" scope="col">Nama</th>
          <th style="text-align: center;" scope="col">Jenis Kelamin</th>
          <th style="text-align: center;" scope="col">Type Tour</th>
          <th style="text-align: center;" scope="col">Tanggal</th>
          {{-- <th style="text-align: center;" scope="col">Menginap</th>
          <th style="text-align: center;" scope="col">Makan</th>
          <th style="text-align: center;" scope="col">Tagihan</th>
          <th style="text-align: center;" scope="col">Status</th> --}}
          <th style="text-align: center;" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item )
        <tr>
          <td style="text-align: center;">{{ $loop->iteration }}</td>
          <td style="text-align: center;">{{ $item->nama_pemesan }}</td>
          <td style="text-align: center;">{{ $item->jenis_kelamin }}</td>
          <td style="text-align: center;">{{ $item->type_tour }}</td>
          <td style="text-align: center;">{{ $item->tanggal_perjalanan }}</td>
          {{-- <td style="text-align: center;">{{ $item->durasi_menginap }} Hari</td>
          <td style="text-align: center;">{{ ($item->makanan == 1 ? 'YA' : 'NO') }}</td>
          <td style="text-align: center;">{{ $item->total_tagihan }}</td>
          <td style="text-align: center;">{{ $item->status }}</td> --}}
          <td style="text-align: center;">
          <a class="btn btn-info btn-sm" href="{{ route('bookinglistperson.show',['id' => $item->id]) }}">Detail</a>
          </td>
        </tr>
        @endforeach
      </tbody>
        {{ $items->links() }}
    </table>
  </div>
</div>
@endsection