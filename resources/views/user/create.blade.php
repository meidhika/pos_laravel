@extends('layouts.app')
@section('title', 'Tambah User')
@section('content')
<form action="{{route('user.store')}}" method="post">
    @csrf
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Lengkap *</label>
        </div>
        <div class="col-sm-5">
            <input required class="form-control" name="name" type="text" placeholder="Nama Lengkap">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Email *</label>
        </div>
        <div class="col-sm-5">
            <input required class="form-control" name="email" type="email" placeholder="Email">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Password *</label>
        </div>
        <div class="col-sm-5">
            <input required class="form-control" name="password" type="password" placeholder="Password">
        </div>
    </div>
    <div class="mb-3 row">

        <div class="col-sm-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>
@endsection