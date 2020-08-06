@extends('layouts.app', ['title' => 'Tambah Cerita'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">
            
            <h2>Tambah Cerita Kalian</h2>
            
            <div class="row ">
                <div class="col-md-9">
                    <form action="/story/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('stories.partials.form-control', ['submit' => 'Post'])
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
