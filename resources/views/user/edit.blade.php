@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<form action="{{route('user.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Lengkap *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{$edit->name}}" required class="form-control" name="name" type="text"
                placeholder="Nama Lengkap">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Email *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{$edit->email}}" required class="form-control" name="email" type="email" placeholder="Email">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Password *</label>
        </div>
        <div class="col-sm-5">
            <input class="form-control" name="password" type="password" placeholder="Password">
        </div>
    </div>
    <div class="mb-3 row">

        <div class="col-sm-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>

@endsection