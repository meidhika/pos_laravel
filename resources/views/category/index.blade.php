@extends('layouts.app')
@section('title', 'Category')
@section('content')

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>

                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach($categories as $category)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-xs btn-success">Edit</a>
                    <form action="{{route('category.destroy', $category->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection