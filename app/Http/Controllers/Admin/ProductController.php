<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        $products = Product::all();

        return view('admin.product.index', compact('productCategories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        $product = Product::all();

        return view('admin.product.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_category_id' => 'required|exists:product_categories,id',
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:50|unique:products,code',
                'description' => 'required|string',
                'feature' => 'required|string',
                'status' => 'required|string|max:50',
                'location' => 'required|string|max:255',
                'size' => 'required|string|max:50',
                'price' => 'required|integer|min:0',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
                'latitude' => ['required', 'regex:/^-?\d{1,2}\.\d{6}$/'],
                'longitude' => ['required', 'regex:/^-?\d{1,3}\.\d{6}$/'],
                'video_url' => 'required|mimes:mp4,avi,wmv,mov|max:20480', // Maksimal 20MB
            ]);

            // Simpan video
            $videoPath = $request->file('video_url')->store('videos', 'public');

            $product = new Product([
                'admin_id' => Auth::guard('is_admin')->user()->id,
                'product_category_id' => $request->input('product_category_id'),
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'description' => $request->input('description'),
                'feature' => $request->input('feature'),
                'status' => $request->input('status'),
                'location' => $request->input('location'),
                'size' => $request->input('size'),
                'price' => $request->input('price'),
                'video_url' => $videoPath, // Simpan path video_url
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'photo' => $request->hasFile('photo') ? $request->file('photo')->store('products', 'public') : null,
            ]);

            $product->save();

            // Menggunakan redirect biasa
            return redirect()->route('product.index')->with('success', 'Data produk baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }


    /**
     * Display the specified resource.
     */
    public function showProduct(string $id)
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }

        $products = Product::find($id);
        // Memisahkan fitur menjadi kalimat-kalimat
        $products->feature_sentences = nl2br($products->feature);

        // Memisahkan deskripsi menjadi kalimat-kalimat
        $products->description_sentences = nl2br($products->description);

        // Memformat harga menggunakan fungsi formatPrice
        $products->formatted_price = formatPrice($products->price);

        $allProducts = Product::all();
        return view('admin.product.show', compact('products', 'allProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Product $product)
    {
        // Ambil kategori produk terkait
        $productCategory = ProductCategory::find($product->product_category_id);

        // Pastikan kategori produk ditemukan
        if ($productCategory) {
            return view('admin.product.edit', compact('product', 'productCategory'));
        } else {
            // Lakukan penanganan jika kategori produk tidak ditemukan
            return redirect()->route('edit.product.index')->with('error', 'Kategori produk tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'product_category_id' => 'required|exists:product_categories,id',
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:50|unique:products,code,' . $product->id,
                'description' => 'required|string',
                'feature' => 'required|string',
                'status' => 'required|string|max:50',
                'location' => 'required|string|max:255',
                'size' => 'required|string|max:50',
                'price' => 'required|integer|min:0',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
                'latitude' => ['required', 'regex:/^-?\d{1,2}\.\d{6}$/'],
                'longitude' => ['required', 'regex:/^-?\d{1,3}\.\d{6}$/'],
                'video_url' => 'required|mimes:mp4,avi,wmv,mov|max:20480', // Maksimal 20MB
            ]);

            // Simpan video
            $videoPath = $request->file('video_url')->store('videos', 'public');

            // Update data produk
            $product->update([
                'product_category_id' => $request->input('product_category_id'),
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'description' => $request->input('description'),
                'feature' => $request->input('feature'),
                'status' => $request->input('status'),
                'location' => $request->input('location'),
                'size' => $request->input('size'),
                'price' => $request->input('price'),
                'photo' => $request->hasFile('photo') ? $request->file('photo')->store('products', 'public') : $product->photo,
                'video_url' => $videoPath, // Simpan path video_url
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
            ]);

            // Menggunakan redirect biasa
            return redirect()->route('product.index')->with('success', 'Data produk berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Hapus kategori produk dari database
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Data produk berhasil dihapus!');
        // set flash message
        return with(['type' => 'success', 'delay' => 2500, 'message' => 'Data produk berhasil dihapus!']);
    }

    /* Category */

    public function indexCategory()
    {
        $productCategories = ProductCategory::all();
        $products = Product::all();

        return view('admin.product.index-category', compact('productCategories', 'products'));
    }

    public function storeCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'location' => 'required|string',
        ]);

        ProductCategory::create($validatedData);

        return redirect()->route('category.index')->with('success', 'Data kategori produk berhasil ditambahkan!');
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

        return redirect()->route('category.index')->with('success', 'Data kategori produk berhasil diperbarui!');
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
        return redirect()->route('category.index')->with('success', 'Data kategori produk berhasil dihapus!');
    }


    public function destroyAllCategory()
    {
        // Cek apakah ada kategori yang memiliki produk
        $categoriesWithProducts = ProductCategory::has('products')->exists();

        if ($categoriesWithProducts) {
            return redirect()->route('category.index')->with('failure', 'Tidak dapat menghapus semua Kategori yang memiliki Produk!');
        }

        // Hapus semua kategori produk dari database
        ProductCategory::truncate();

        // Redirect dengan pesan sukses
        return redirect()->route('category.index')->with('success', 'Semua data kategori produk berhasil dihapus!');
    }
}
