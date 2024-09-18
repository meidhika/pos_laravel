@extends('layouts.app')
@section('title', 'Tambah Product')
@section('content')
<form action="{{route('product.store')}}" method="post">
    @csrf
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Pilih Kategori</label>
        </div>
        <div class="col-sm-5">
            <select name="category_id" id="" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)

                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Nama Produk</label>
        </div>
        <div class="col-sm-5">
            <input required type="text" name="product_name" placeholder="Product Name" class="form-control">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Qty</label>
        </div>
        <div class="col-sm-5">
            <input required type="number" name="product_qty" placeholder="Product Qty" class="form-control">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="" class="form-label">Harga</label>
        </div>
        <div class="col-sm-5">
            <input required type="number" name="product_price" placeholder="Harga" class="form-control">
        </div>
    </div>
    <div class="mb-3 row">

        <div class="col-sm-12">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>
</form>
@endsection