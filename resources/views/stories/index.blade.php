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
                <div class="col-md-4 mt-2">
                    <div class="card h-100">
                        <div class="card-body">
                          <h5 class="card-title">{{ $story->title }}</h5>
                          {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                          <p class="card-text">{!! Str::limit($story->body, 250, '...') !!}</p>
                          <p class="card-text"><small class="text-muted">Last updated {{ $story->created_at->diffForHumans() }}</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ $story->slug }}/edit" class="card-link ">Edit</a>
                            <form action="/story/{{ $story->slug }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <a href="{{ $story->slug }}/show" class="card-link">Detail</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div> --}}
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
