@extends('layouts.app')
@section('title', 'Transaksi Penjualan')

@section('content')
<form action="{{route('penjualan.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="">Kode Transaksi</label>
                <input type="text" class="form-control" readonly value="{{$kode_transaksi ?? ''}}" name="kode_transaksi">
            </div>
            <div class="mb-3">
                <label for="">Kategori Product <span style="color:red;">*</span></label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Pilih Kategori Product</option>
                    @foreach ($categories as $cat )
                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                        
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Qty Product <span style="color:red;">*</span></label>
                <input type="number" class="form-control" placeholder="Qty Product" id="product_qty" name="product_qty" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="">Tanggal Transaksi</label>
                <input type="text" class="form-control" readonly value="<?php echo date('d/M/Y'); ?>"
                    name="tanggal_transaksi">
            </div>
            <div class="mb-3">
                <label for="">Nama Product <span style="color:red;">*</span></label>
                <select id="product_id" class="form-control" name="" required>
                    <option value="">Pilih Product</option>
                </select>
            </div>
        </div>
    </div>
    <input type="hidden" id="product_price">
    <input type="hidden" id="product_name">
    <div class="table-transaction mt-5">
        <div class="mb-3" align="right">
            <button type="button" class="btn btn-primary tambah-produk">TambahProduk</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="row mt-2">
            <div class="col-sm-8 text-right">
                <h3>Total</h3>
            </div>
            <div class="col-sm-4 text-center">
                <h3 class="total_price"></h3>
                <input type="hidden" name="total_price" id="total_price_val">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-8 text-right">
                <h3>Di Bayar</h3>
            </div>
            <div class="col-sm-4 text-center">
            <input type="number" id="dibayar" class="form-control" name="dibayar" plac>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-8 text-right">
                <h3>Kembalian</h3>
            </div>
            <div class="col-sm-4 text-center">
                <h3 class="kembalian_text"></h3>
                <input type="hidden" class="form-control" readonly id="kembalian" name="kembalian">
            </div>
        </div>
        <div class="mt-4" align="right">
            <button type="submit" class="btn btn-success">Buat Pesanan</button>
        </div>
    </div>
</form>

@endsection