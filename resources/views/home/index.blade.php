@extends('layouts.master')

@section('content')
    <div class="row">
      @foreach ($items as $item)
      <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
        <div class="card h-100">
            <div class="image-box">
                <img src="/images/{{$item->image}}" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $item->package_name }}</h4>
                <p style="color:black;
                opacity:80%" class="card-text text-truncate">{{ $item->destinations }}</p>
                <p style="color: black; opacaity:70%;" class="text-sm-description">{{ $item->description }}</p>
                <a href="{{ route('personreservation.index') }}" class="btn btn-info btn-sm text-white">Pesan Paket</a>
            </div>
        </div>
      </div>
      @endforeach
  </div>
@endsection

@push('css')
    <style>
      .text-sm-description{
        font-size: 12px
      }
    </style>
@endpush