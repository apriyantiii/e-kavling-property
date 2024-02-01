<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\PurchaseValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
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

        // Ambil data pesanan berdasarkan status pembelian yang disetujui
        $purchaseValidation = PurchaseValidation::where('status', 'approved')->first();

        // Ambil data relasi user dan product
        $user = $purchaseValidation->user;
        $product = $purchaseValidation->product;

        // Tambahkan formatted_price ke objek product
        $product->formatted_price = formatPrice($product->price);

        // Kirim data pesanan dan relasi ke view
        return view('user.checkout.payments.index', compact('purchaseValidation', 'user', 'product'));

        // // Pastikan data pesanan tersedia
        // if ($purchaseValidation) {

        // }

        // // Handle jika data pesanan tidak ditemukan
        // return redirect()->route('waiting-validate');
        // return view('user.checkout.payments.index');
    }

    public function paymentSuccess()
    {
        return view('user.checkout.payments.success-payments');
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
        try {
            // Validasi form jika diperlukan
            $request->validate([
                'purchase_validation_id' => 'required|exists:purchase_validations,id',
                'product_id' => 'required|exists:products,id',
                'name' => 'required|string|max:255',
                'payment_date' => 'required|date',
                'type' => 'required|in:cash,inhouse,kpr',
                'tenor' => 'nullable|string',
                'home_bank' => 'required|string|max:255',
                'destination_bank' => 'required|string|max:255',
                'rekening_name' => 'required|string|max:255',
                'nominal' => 'required|integer',
                'transfer' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'payment_description' => 'nullable|string',
            ]);

            // $purchaseValidationID = $request->input('purchase_validation_id');
            // $purchaseValidation = PurchaseValidation::find($purchaseValidationID);

            $userId = Auth::id();

            $tfFileName = null;
            if ($request->hasFile('transfer')) {
                $transferFile = $request->file('transfer');
                $tfFileName = 'tf_' . time() . '.' . $transferFile->getClientOriginalExtension();
                $transferFile->storeAs('public/uploads', $tfFileName);
            }

            // Simpan data pembayaran ke dalam tabel payments
            Payments::create([
                'purchase_validation_id' => $request->input('purchase_validation_id'),
                'user_id' => $userId,
                'product_id' => $request->input('product_id'),
                'name' => $request->input('name'),
                'payment_date' => $request->input('payment_date'),
                'type' => $request->input('type'),
                'tenor' => $request->input('tenor'),
                'home_bank' => $request->input('home_bank'),
                'destination_bank' => $request->input('destination_bank'),
                'rekening_name' => $request->input('rekening_name'),
                'nominal' => $request->input('nominal'),
                'transfer' => $tfFileName,
                'payment_description' => $request->input('payment_description'),
            ]);

            // Menggunakan redirect biasa
            $redirect = redirect()->route('checkout.payments-success')->with('success', 'Data konfirmasi pembayaran berhasil disimpan!');
            // dd(session('success'), $redirect);

            return $redirect;
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
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
