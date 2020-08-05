@extends('layouts.app', ['title' => 'Tampilkan cerita'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('stories.index') }}" class="btn btn-danger btn-sm mb-2">Kembali</a>
                <div class="card">
                    <div class="card-header">
                      <h4>{{ $story->title }}</h4>
                    </div>
                    <div class="card-body">
                      <a href="/categories/{{ $story->category->slug }}">{{ $story->category->name }}</a>
                      &middot;
                      @foreach ($story->tags as $tag)
                          <a href="#">{{ $tag->name }}</a>
                      @endforeach
                      <h6 class="card-subtitle mb-2 text-muted">{{ $story->created_at->format('d F Y') }}</h6>
                      <p class="card-text">{!! $story->body !!}</p>
                    </div>
                  </div>                  
            </div>
        </div>
    </div>
@endsection