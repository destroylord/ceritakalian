@extends('layouts.app', ['title' => 'Change Password'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.navbar-vertical')
        </div>
        <div class="col-md-10">            
            <div class="row ">
                <div class="col-md-9">
                    <form>
                        <div class="form-group">
                            <label for="password lama">Password lama</label>
                            <input id="password lama" class="form-control" type="password" name="passwordold">
                            <label for="password baru">Password baru</label>
                            <input id="password baru" class="form-control" type="password" name="passwordold">
                            <label for="">Change Password</label>
                            <input id="change-password" class="form-control" type="password" name="passwordold">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
