<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('admin.product.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /* Category */
    public function storeCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'location' => 'required|string',
        ]);

        ProductCategory::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Data kategori produk berhasil ditambahkan!');
        // set flash message
        return with(['type' => 'success', 'delay' => 2500, 'message' => 'Data kategori produk berhasil ditambahkan!']);
    }

    public function editCategory(ProductCategory $productCategory)
    {
        return view('admin.product.edit-category', compact('productCategory'));
    }

    public function updateCategory(Request $request, ProductCategory $productCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'location' => 'required|string',
        ]);

        $productCategory->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Data kategori produk berhasil diperbarui!');
        // set flash message
        return with(['type' => 'success', 'delay' => 2500, 'message' => 'Data kategori produk berhasil diperbaharui!']);
    }

    public function destroyCategory(ProductCategory $productCategory)
    {
        // Cek apakah kategori memiliki produk
        // if ($productCategory->products()->exists()) {
        //     return redirect()->route('product.index')->with('failure', 'Tidak dapat menghapus Kategori yang memiliki Produk!');
        // }

        // Hapus kategori produk dari database
        $productCategory->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Data kategori produk berhasil dihapus!');
    }


    public function destroyAllCategory()
    {
        // Cek apakah ada kategori yang memiliki produk
        // $categoriesWithProducts = ProductCategory::has('products')->exists();

        // if ($categoriesWithProducts) {
        //     return redirect()->route('productRetail.index')->with('failure', 'Tidak dapat menghapus semua Kategori yang memiliki Produk!');
        // }

        // Hapus semua kategori produk dari database
        ProductCategory::truncate();

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Semua data kategori produk berhasil dihapus!');
    }
}
