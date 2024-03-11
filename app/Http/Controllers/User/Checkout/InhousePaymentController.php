<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\InhousePayment;
use App\Models\Product;
use App\Models\PurchaseValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InhousePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($productId)
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

        $bank = Bank::first();

        // Ambil data relasi user dan product
        $user = $purchaseValidation->user;

        $product = \App\Models\Product::findOrFail($productId);

        // Tambahkan formatted_price ke objek product
        $product->formatted_price = formatPrice($product->price);

        // Kirim data pesanan dan relasi ke view
        return view('user.checkout.inhouse-payment.create', compact('purchaseValidation', 'user', 'product', 'bank'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi form
            $validatedData = $request->validate([
                'purchase_validation_id' => 'required|exists:purchase_validations,id',
                'product_id' => 'required|exists:products,id',
                'name' => 'required|string|max:255',
                'payment_date' => 'required|date',
                'payment_type' => 'required|string',
                'tenor' => 'required|string',
                'home_bank' => 'required|string|max:255',
                'destination_bank' => 'required|string|max:255',
                'rekening_name' => 'required|string|max:255',
                'nominal' => 'required|integer',
                'transfer' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'payment_description' => 'nullable|string',
            ]);

            // Jika opsi "lainnya" dipilih pada dropdown tenor, ganti nilai tenor dengan nilai dari input tambahan
            if ($request->tenor == 'lainnya') {
                $validatedData['tenor'] = $request->tenor_lainnya;
            }

            // Jika opsi "lainnya" dipilih pada dropdown type, ganti nilai type dengan nilai dari input tambahan
            if ($request->type == 'lainnya') {
                $validatedData['payment_type'] = $request->type_lainnya;
            }

            // Mendapatkan ID user yang sedang login
            $userId = Auth::id();

            // Ambil data produk
            $product = Product::findOrFail($request->product_id);

            // Mengelola file transfer
            $tfFileName = null;
            if ($request->hasFile('transfer')) {
                $transferFile = $request->file('transfer');
                $tfFileName = 'tf_' . time() . '.' . $transferFile->getClientOriginalExtension();
                $transferFile->storeAs('public/uploads', $tfFileName);
            }

            // Mendapatkan pembayaran terakhir untuk produk tertentu
            $lastPayment = InhousePayment::where('product_id', $product->id)
                ->orderBy('created_at', 'desc')
                ->first();

            // Menghitung sisa pembayaran baru
            if ($lastPayment) {
                $newRemainingAmount = $lastPayment->remaining_amount - $validatedData['nominal'];
            } else {
                // Jika belum ada pembayaran sebelumnya, langsung kurangi dari total harga produk
                $newRemainingAmount = $product->price - $validatedData['nominal'];
            }

            // Simpan data pembayaran ke dalam tabel inhouse_payments
            $inhousePayment = InhousePayment::create([
                'purchase_validation_id' => $validatedData['purchase_validation_id'],
                'user_id' => $userId,
                'product_id' => $product->id,
                'name' => $validatedData['name'],
                'payment_date' => $validatedData['payment_date'],
                'payment_type' => $validatedData['payment_type'],
                'tenor' => $validatedData['tenor'],
                'home_bank' => $validatedData['home_bank'],
                'destination_bank' => $validatedData['destination_bank'],
                'rekening_name' => $validatedData['rekening_name'],
                'nominal' => $validatedData['nominal'],
                'remaining_amount' => $newRemainingAmount,
                'transfer' => $tfFileName,
                'payment_description' => $validatedData['payment_description'],
            ]);

            // dd($inhousePayment);

            // Redirect ke halaman sukses pembayaran
            return redirect()->route('checkout.payments-success')->with('success', 'Inhouse Payment disimpan!');
        } catch (\Exception $e) {
            // Tangkap exception dan tampilkan pesan untuk debugging
            dd($e->getMessage());
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */


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
