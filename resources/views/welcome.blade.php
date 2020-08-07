@extends('layouts.app', ['title' => 'Welcome App'])

@section('content')
    <div class="container">
        <h4>Artikel baru</h4>
        <div class="row">
            <div class="col-md-8">
                @foreach ($terbaru as $new)
                    <div class="card mb-3">
                        @if ($new->takeImage)
                            <img src="{{ $new->takeImage }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"><a class="text-body" href="/story/{{ $new->slug }}"> {{ $new->title }} </a></h5>
                            <a href="/categories/{{ $new->category->slug }}">{{ $new->category->name }}</a>
                            /
                            @foreach ($new->tags as $tag)
                                <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                            @endforeach
                            <p>Author : {{ $new->user->name }}</p>
                            <p class="card-text">{!! Str::limit($new->body, 250, '...') !!}</p>
                            <p class="card-text"><small class="text-muted">Last updated {{ $new->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <h4>Rekomendasi</h4>
                    @forelse ($rekomendasi as $rek)
                        <div class="card mt-2">
                            <div class="card-body">
                              <h4 class="card-title"><a class="text-uppercase text-body" href="/story/{{ $rek->slug }}"> {{ $rek->title }} </a></h4>
                              <h6 class="card-subtitle mb-2 text-muted">
                                <a href="/categories/{{ $rek->category->slug }}">{{ $rek->category->name }}</a>
                                /
                                @foreach ($rek->tags as $tag)
                                    <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                                @endforeach
                                <p>Author : {{ $new->user->name }}</p>
                              </h6>
                              <p class="text-muted">Published : {{ $rek->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <p>Maaf masih kosong</p>
                    @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="d-flex justify-content-center">
                    {{ $terbaru->links() }}
                </div>
            </div>
        </div>
    </div>
@stop