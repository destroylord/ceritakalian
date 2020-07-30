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
                    <form action="" method="POST">
                        <div class="form">
                        <div class="form-group ">
                            <label for="inputEmail4">Judul</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputAddress">Category</label>
                        <select name="" id="" class="form-control">
                            <option selected disabled>Pilih salah satu</option>
                            <option value="">Horror</option>
                            <option value="">Aktifitas</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="inputAddress2">Tags</label>
                        <select class="select2 form-control" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                          </select>
                        </div>
                        <div class="form">
                        <div class="form-group ">
                            <label for="inputCity">City</label>
                            <textarea class="article-ckeditor form-control" name="article-ckeditor"></textarea>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Post</button>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input id="" class="form-control" type="file" name="">
                    </div>
                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
