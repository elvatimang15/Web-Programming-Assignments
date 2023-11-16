<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $productLine = $request->input('productLine'); // Ambil nilai yang diinputkan pengguna

        $products = Product::where('productLine', $productLine)->get();

        if ($products->isEmpty()) {
            $pesanAlert = "Tidak ada produk yang cocok dengan product line yang Anda cari.";
            echo "<script>alert('$pesanAlert');</script>";
        }

        return view('productlines', ['products' => $products]);
    }

    public function showProduct($productName)
    {
        $product = Product::where('productName', $productName)->first();

        return view('show', ['product' => $product]);
    }
}
