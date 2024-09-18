@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<form action="{{route('category.update', $edit->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Category *</label>
        </div>
        <div class="col-sm-5">
            <input value="{{$edit->category_name}}" required class="form-control" name="category_name" type="text"
                placeholder="Category Name">
        </div>
    </div>

    <div class="mb-3 row">

        <div class="col-sm-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>

@endsection