<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.form', [
            'title' => 'Tambah',
            'product' => new Product(),
            'route' => route('product.store'),
            'method' => 'POST',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000',
        ]);

        Product::create($validated);
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.form', [
            'title' => 'Edit',
            'product' => $product,
            'route' => route('product.update', $product),
            'method' => 'PUT',
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer|min:1000000',
        ]);

        $product->update($validated);
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }

    public function storeVariant(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'processor' => 'required',
            'memory' => 'required',
            'storage' => 'required',
        ]);

        $product->variants()->create($validated);

        return redirect()->route('product.index')->with('success', 'Variant berhasil ditambahkan ke produk ' . $product->name);
    }
}
