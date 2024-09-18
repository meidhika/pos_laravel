@extends('layouts.app')
@section('title', 'Data User')
@section('content')

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="{{route('user.create')}}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered text-center" id="example1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach($users as $key => $user)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-xs btn-success">Edit</a>
                    <!-- <a href="{{route('user.destroy', $user->id)}}" class="btn btn-xs btn-danger">Delete</a> -->
                    <form action="{{route('user.destroy', $user->id)}}" method="post" class="d-inline">
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