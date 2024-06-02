@extends('layouts.master')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
              <h5 class="card-header">Login</h5>
              <div class="card-body">
                  <div class="row">
                    @if(Session::has('status'))
                    <p class="alert alert-info">{{ Session::get('status') }}</p>
                    @endif
                  </div>
                  <form action="{{ route('login.authenticate') }}" method="POST">
                    @csrf
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email">
                      </div>
                      <div class="form-group mt-3">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" name="password">
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection