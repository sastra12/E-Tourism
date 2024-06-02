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
<a href="{{ route('tourpackages.create') }}" class="btn btn-primary mb-3">Tambah Data Paket Pariwisata</a>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th style="text-align: center;" scope="col">Nama Paket</th>
        <th style="text-align: center;" scope="col">Destinasi</th>
        <th style="text-align: center;" scope="col">Gambar</th>
        <th style="text-align: center;" scope="col">Description</th>
        <th style="text-align: center;" scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item )
      <tr>
        <td style="text-align: center;">{{ $item->package_name }}</td>
        <td style="text-align: center;">{{ $item->destinations }}</td>
        <td style="text-align: center;">
          <img src="/images/{{$item->image}}" alt="" class="image-td">
        </td>
        <td style="text-align: justify;">{{ $item->description }}</td>
        <td style="text-align: center;
                    display: flex;
                    gap: 2px;
        ">
        <a class="btn btn-info btn-sm" href="{{ route('tourpackages.edit',['id' => $item->id]) }}">Edit</a>
        <a onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm" href="{{ route('tourpackages.delete', ['id' => $item->id]) }}">Hapus</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@push('css')
    <style>
      .image-td{
        width: 120px;
        height: auto;
      }
    </style>
@endpush