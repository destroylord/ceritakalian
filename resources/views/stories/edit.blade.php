@extends('layouts.app', ['title' => 'Edit Cerita'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">            
            <div class="row ">
                <div class="col-md-9">
                    <form action="edit" method="POST">
                        @method('PATCH')
                        @csrf
                        <h4>Cerita : {{ $story->title }}</h4>
                        @include('stories.partials.form-control')
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
