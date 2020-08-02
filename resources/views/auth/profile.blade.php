@extends('layouts.app', ['title' => 'Profil'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">            
            <div class="row ">
                <div class="col-md-9">
                    <form action="/setting/profil" method="POST" autocapitalize="off">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="Name">Nama</label>
                            <small class="form-text text-muted">Silahkan ganti dengan nama sesuka hati anda</small>
                            <input type="text" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" id="Name" name="name">
                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                           
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}" readonly>
                         
                        </div>
                        <button type="submit" class="btn btn-primary">Change Profile</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
