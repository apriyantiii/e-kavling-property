<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexCategories()
    {
        return view('user.products.index-categories');
    }

    public function search(Request $request)
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
        return view('user.products.search', [
            'keyword' => $keyword,
            'allProducts' => $results
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        try {
            // Fungsi formatPrice 
            if (!function_exists('formatPrice')) {
                function formatPrice($price)
                {
                    return 'Rp ' . number_format($price, 0, ',', '.');
                }
            }

            $products = Product::findOrFail($id);

            // $products = Product::find($id);
            // Memisahkan fitur menjadi kalimat-kalimat
            $products->feature_sentences = nl2br($products->feature);

            // Memisahkan deskripsi menjadi kalimat-kalimat
            $products->description_sentences = nl2br($products->description);

            // Memformat harga menggunakan fungsi formatPrice
            $products->formatted_price = formatPrice($products->price);

            $allProducts = Product::all();

            // Periksa jika produk sudah terdata di tabel payments dengan status approved
            $payment = Payments::where(
                'product_id',
                $id
            )
                ->where('status', 'approved')
                ->first();

            // Mengirimkan informasi ke tampilan
            $isProductPurchased = $payment ? true : false;
            return view('user.products.show', compact('products', 'allProducts', 'isProductPurchased'));
        } catch (ModelNotFoundException $e) {
            // Produk tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->route('user.products.show')->with('error', 'Produk tidak ditemukan.');
        }
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
