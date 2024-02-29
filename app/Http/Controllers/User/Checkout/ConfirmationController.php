<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\PurchaseValidation;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $confirmation = PurchaseValidation::all();

    //     return view('user.checkout.confirmation.index', compact('confirmation'));
    // }
    public function index($productId)
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }

        // Ambil data pesanan berdasarkan status pembelian yang disetujui
        $purchaseValidation = PurchaseValidation::where('status', 'approved')->first();

        // Pastikan data pesanan tersedia
        if ($purchaseValidation) {
            // Ambil data relasi user dan product
            $user = $purchaseValidation->user;
            // $product = $purchaseValidation->product;
            // Ambil produk berdasarkan ID yang ditekan
            $product = \App\Models\Product::findOrFail($productId);

            // Tambahkan formatted_price ke objek product
            $product->formatted_price = formatPrice($product->price);

            // Kirim data pesanan dan relasi ke view
            return view('user.checkout.confirmation.index', compact('purchaseValidation', 'user', 'product'));
        }

        $purchaseValidate = PurchaseValidation::findOrFail($productId);

        // Handle jika data pesanan tidak ditemukan
        return redirect()->route('waiting-validate', $purchaseValidate->id);
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
