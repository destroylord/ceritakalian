@extends('layouts.app', ['title' => 'Tambah Cerita'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        </div>
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">
            <a href="{{ route('stories.create') }}" class="btn btn-sm btn-primary">Tambah Cerita</a>
            
            @isset($category)
                <h4>Category : {{ $category->name }}</h4>
            @endisset
            @isset($tag)
                <h4>Tag : {{ $tag->name }}</h4>
            @endisset

            @if (!isset($category) && !isset($tag))
                <h4>All post</h4>
            @endif
            

            <div class="row mt-3">
           
                @forelse ($stories as $story)
                @can('view', $story)
                <div class="col-md-4 mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                          <h5 class="card-title">{{ $story->title }}</h5>
                            <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">
                                <a href="/categories/{{ $story->category->slug }}">{{ $story->category->name }}</a> / 
                                <cite title="Source Title">
                                    @foreach ($story->tags as $tag)
                                        <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                                    @endforeach
                                </cite>
                            </footer>
                            </blockquote>
                          {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                          <p class="card-text">{!! Str::limit($story->body, 250, '...') !!}</p>
                          <p class="card-text"><small class="text-muted">Last updated {{ $story->created_at->diffForHumans() }}</small></p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            @can('update', $story)
                            <a href="{{ $story->slug }}/edit" class="btn btn-success btn-sm ">Edit</a>
                            @endcan
                            <form action="/story/{{ $story->slug }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                            <a href="{{ $story->slug }}/show" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
                @endcan
                @empty 
                    <div class="alert alert-info">
                        <b>Maaf!!</b> <small>Story anda masih kosong</small>
                    </div>
                    
                @endforelse
            </div>
            <br>
                {{ $stories->links() }}
        </div>
    </div>
</div>
@endsection
