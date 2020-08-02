@extends('layouts.app', ['title' => 'Tong Sampah'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">
            <a href="/story/restoreall" class="btn btn-primary btn-sm">Kembalikan semua</a>
            <a href="/story/deleteall" class="btn btn-danger btn-sm">Hapus permanen semuanya</a>

            
            <table class="table mt-2 table-sm">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">delete_at</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($stories as $story)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $story->title }}</td>
                    <td>{!! Str::limit($story->body, 80, '...') !!}</td>
                    <td>{{ $story->deleted_at->format('d/m/y') }}</td>
                    <td>
                        <a href="{{ $story->slug }}/restore" class="btn btn-success btn-sm">Restore</a>
                        <a href="{{ $story->slug }}/deletebyOne" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  @empty 
                  <div class="alert alert-info">
                      <b>Maaf!!</b> <small>Story tidak ada di tong sampah</small>
                  </div>
                 @endforelse
                </tbody>
            </table>
            {{ $stories->links() }}

            Jumlah : {{ $stories->count() }}

            </div>
            
            <br>
           

        </div>
    </div>
</div>
@endsection
