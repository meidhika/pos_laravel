@extends('layouts.app')
@section('title', 'Tambah Category')
@section('content')
<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Category Name *</label>
        </div>
        <div class="col-sm-5">
            <input required class="form-control" name="category_name" type="text" placeholder="Category Name">
        </div>
    </div>
    <div class="mb-3 row">

        <div class="col-sm-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>
@endsection