@extends('layouts.app', ['title' => 'Change Password'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">
            <div class="row ">
                <div class="col-md-9">
                    <form action="/setting/changes-password" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="password">Password Saat ini</label>
                            <input id="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" type="password">
                            @error('current_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="password baru">Password baru</label>
                            <input id="password baru" name="password" class="form-control @error('password') is-invalid @enderror" type="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="">Konfirmasi Password baru</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
