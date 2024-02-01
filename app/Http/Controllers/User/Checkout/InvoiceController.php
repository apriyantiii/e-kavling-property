<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\PurchaseValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }

        // Ambil ID pengguna yang saat ini login
        $currentUserId = Auth::id();

        // Ambil data pembelian berdasarkan status pembelian yang disetujui atau masih pending dan user_id
        $purchaseValidation = PurchaseValidation::with('product')
            ->where(function ($query) use ($currentUserId) {
                $query->where('status', 'approved')
                    ->orWhere('status', 'pending');
            })
            ->where('user_id', $currentUserId)
            ->get();

        // Tambahkan formatted_price ke objek product
        foreach ($purchaseValidation as $validation) {
            if ($validation->product) {
                $validation->product->formatted_price = formatPrice($validation->product->price);
            }
        }

        // Kirim data pembelian ke view
        return view('user.checkout.invoice.index', compact('purchaseValidation'));
    }
    // public function index()
    // {
    //     // Fungsi formatPrice 
    //     if (!function_exists('formatPrice')) {
    //         function formatPrice($price)
    //         {
    //             return 'Rp ' . number_format($price, 0, ',', '.');
    //         }
    //     }

    //     // Ambil data pesanan berdasarkan status pembelian yang disetujui
    //     $payments = Payments::where('status', 'approved')->first();

    //     // Ambil data relasi user dan product
    //     // $user = $payments->user;
    //     $product = $payments->purchaseValidation->product;

    //     // Tambahkan formatted_price ke objek product
    //     $product->formatted_price = formatPrice($product->price);

    //     // Kirim data pesanan dan relasi ke view
    //     return view('user.checkout.invoice.index', compact('payments', 'product'));
    // }

    // public function index($id_purchase_validation)
    // {
    //     // Fungsi formatPrice 
    //     if (!function_exists('formatPrice')) {
    //         function formatPrice($price)
    //         {
    //             return 'Rp ' . number_format($price, 0, ',', '.');
    //         }
    //     }

    //     // Ambil data pembayaran berdasarkan id_purchase_validation
    //     $payment = Payments::with('purchaseValidation.product')
    //         ->where('purchase_validation_id', $id_purchase_validation)
    //         ->first();

    //     // // Periksa apakah pembayaran ditemukan
    //     // if (!$payment) {
    //     //     // Handle jika tidak ada pembayaran yang sesuai
    //     //     // Misalnya, redirect atau tampilkan pesan kesalahan
    //     //     return redirect()->route('nama_route_ke_halaman_yang_diinginkan');
    //     // }

    //     // // Periksa apakah relasi purchaseValidation dan product ada
    //     // if (!$payment->purchaseValidation || !$payment->purchaseValidation->product) {
    //     //     // Handle jika relasi purchaseValidation atau product tidak ditemukan
    //     //     // Misalnya, redirect atau tampilkan pesan kesalahan
    //     //     return redirect()->route('nama_route_ke_halaman_yang_diinginkan');
    //     // }

    //     // Tambahkan formatted_price ke objek product
    //     $product = $payment->purchaseValidation->product;
    //     $product->formatted_price = formatPrice($product->price);

    //     // Kirim data pembayaran dan relasi ke view
    //     return view('user.checkout.invoice.index', compact('payment', 'product'));
    // }

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
