@extends('layouts.main')
@section('container')
    <h2 class="mt-4">Informasi Produk</h2>
    <h5 class="mt-4">Nama Produk : {{ $product->productName }}</h5>
    <p>Jenis Produk : {{ $product->productLine }}</p>
    <p>Skala Produk : {{ $product->productScale }}</p>
    <p>Penjual Produk : {{ $product->productVendor }}</p>
    <p>Deskripsi : {{ $product->productDescription }}</p>
    <p>Stok Barang : {{ $product->quantityInStock }}</p>
    <p>Harga Beli : {{ $product->buyPrice }}</p>
    <p>Harga Eceran Tertinggi : {{ $product->MSRP }}</p>
    <a href="/product" class="btn btn-success">Back to products</a>
@endsection
