@extends('layouts.app', ['title' => 'Tambah Cerita'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">
            
            <h2>Edit Cerita Kalian</h2>
            
            <div class="row ">
                <div class="col-md-9">
                    <form action="/story/store" method="POST">
                        @csrf
                        @include('stories.partials.form-control')
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
