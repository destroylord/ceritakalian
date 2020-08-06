@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">Selamat Datang</h1>
                  <p class="lead">Silahkan mengisi cerita anda bisa langsung klik <a href="{{ route('stories.index') }}"> disini.</a></p>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
