@extends('layouts.app', ['title' => 'Tampilkan cerita'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('stories.index') }}" class="btn btn-danger btn-sm mb-2">Kembali</a>
                <div class="card">
                    <div class="card-header">
                      {{ $story->title }}
                    </div>
                    <div class="card-body">
                      <p class="card-text">{!! $story->body !!}</p>
                    </div>
                  </div>                  
            </div>
        </div>
    </div>
@endsection