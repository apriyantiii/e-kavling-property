<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\PurchaseValidation;
use Faker\Provider\ar_EG\Payment;
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


        $payments = Payments::with('product')
            ->where(function ($query) use ($currentUserId) {
                $query->where('status', 'approved')
                    ->orWhere('status', 'process')
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

        // Tambahkan formatted_price ke objek product
        foreach ($payments as $payment) {
            if ($payment->product) {
                $payment->product->formatted_price = formatPrice($payment->product->price);
            }
        }

        // Kirim data pembelian ke view
        return view('user.checkout.invoice.index', compact('purchaseValidation', 'payments'));
    }

    public function showValidate(PurchaseValidation $purchaseValidationShow)
    {
        // Pastikan bahwa pembelian yang ditampilkan hanya milik pengguna yang saat ini login
        $currentUserId = Auth::id();

        // Ambil data pembelian berdasarkan ID pembelian yang diberikan dan user_id
        $purchaseValidation = PurchaseValidation::with('product')
            ->where('user_id', $currentUserId)
            ->findOrFail($purchaseValidationShow->id);

        return view('user.checkout.invoice.show-validate', compact('purchaseValidation'));
    }

    public function showPayment(Payments $payments)
    {
        return view('user.checkout.invoice.show-payments', compact('payments'));
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
