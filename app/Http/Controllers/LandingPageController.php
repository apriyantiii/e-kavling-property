<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\PurchaseValidation;
use App\Models\Testimoni;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonis = Testimoni::all();
        $products = Product::latest()->take(3)->get();
        return view('landing-page', compact('testimonis', 'products'));
    }

    public function cetegories(Request $request)
    {
        $allCategories = ProductCategory::orderBy('created_at', 'desc')->get();

        return view('guest.categories', compact('allCategories'));
    }

    public function property(Request $request)
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }

        $allProducts = Product::orderBy('created_at', 'desc')->get();

        // Memformat harga menggunakan fungsi formatPrice untuk setiap produk
        $allProducts->transform(function ($product) {
            $product->formatted_price = formatPrice($product->price);
            return $product;
        });

        return view('guest.properti', compact('allProducts'));
    }

    public function propertySearch(Request $request)
    {
        $keyword = $request->search;

        $results = Product::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orWhere('location', 'like', '%' . $keyword . '%')
            ->orWhere('size', 'like', '%' . $keyword . '%')
            ->orWhere('feature', 'like', '%' . $keyword . '%')
            ->orWhere('price', 'like', '%' . $keyword . '%')
            ->orWhere('code', 'like', '%' . $keyword . '%')
            ->get();

        $picture = Picture::find(9);

        // Check if results are empty
        if ($results->isEmpty()) {
            // If no results, create an empty collection
            $results = collect();
        }

        return view('guest.search-property', [
            'keyword' => $keyword,
            'allProducts' => $results,
            'picture' => $picture,
        ]);
    }

    public function detailProperti(string $id)
    {
        try {
            // Fungsi formatPrice 
            if (!function_exists('formatPrice')) {
                function formatPrice($price)
                {
                    return 'Rp ' . number_format($price, 0, ',', '.');
                }
            }
            $products = Product::findOrFail($id);
            // Memisahkan fitur menjadi kalimat-kalimat
            $products->feature_sentences = nl2br($products->feature);

            // Memisahkan deskripsi menjadi kalimat-kalimat
            $products->description_sentences = nl2br($products->description);

            // Memformat harga menggunakan fungsi formatPrice
            $products->formatted_price = formatPrice($products->price);

            $allProducts = Product::all();

            // Periksa jika produk sudah terdata di tabel purchaseValidation dengan status approved
            $purchaseValidation = PurchaseValidation::where('product_id', $id)
                ->where('status', 'approved')
                ->first();

            // Mengirimkan informasi ke tampilan
            $isProductPurchased = $purchaseValidation ? true : false;

            $picture = Picture::find(8);
            return view('guest.detail-properti', compact('products', 'allProducts', 'isProductPurchased', 'picture'));
        } catch (ModelNotFoundException $e) {
            // Produk tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->route('guest.detail-properti')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function showCategories($categoryId)
    {
        // Mengambil data kategori produk berdasarkan $categoryId
        $productCategory = ProductCategory::findOrFail($categoryId);

        // Mengambil produk yang memiliki product_category_id yang sama dengan $categoryId
        $products = Product::where('product_category_id', $categoryId)->get();

        // Menyiapkan array untuk menyimpan status setiap produk
        $statuses = [];

        // Loop melalui setiap produk untuk menentukan statusnya
        foreach ($products as $product) {
            // Cek apakah product_id tersebut sudah terdapat pada tabel purchase_validations
            $isSold =
                PurchaseValidation::where('product_id', $product->id)
                ->where('status', 'approved')
                ->exists();
            // Jika sudah, maka statusnya "sold", jika belum maka "available"
            $status = $isSold ? 'sold' : 'available';
            // Tambahkan status ke dalam array statuses
            $statuses[$product->id] = $status;
        }

        $picture = Picture::find(3);
        return view('guest.categories-show', compact('productCategory', 'products', 'statuses', 'picture'));
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
}