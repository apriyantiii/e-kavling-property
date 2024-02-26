<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\InhousePayment;
use App\Models\Payments;
use App\Models\PurchaseValidation;
use App\Models\User;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('created_at', 'desc') // Tambahkan orderBy untuk mengurutkan berdasarkan created_at terbaru
            ->get();

        $payments = Payments::with('product')
            ->where(function ($query) use ($currentUserId) {
                $query->where('status', 'approved')
                    ->orWhere('status', 'process')
                    ->orWhere('status', 'pending');
            })
            ->where('user_id', $currentUserId)
            ->orderBy('created_at', 'desc') // Tambahkan orderBy untuk mengurutkan berdasarkan created_at terbaru
            ->get();


        // $inhousePayments = InhousePayment::with('product')
        //     ->where(function ($query) use ($currentUserId) {
        //         $query->where('status', 'approved')
        //             ->orWhere('status', 'process')
        //             ->orWhere('status', 'pending');
        //     })
        //     ->where('user_id', $currentUserId)
        //     ->get();
        // Subquery untuk mendapatkan entri terbaru untuk setiap product_id
        $latestInhousePayments = InhousePayment::select('product_id', DB::raw('MAX(created_at) as latest_created_at'))
            ->groupBy('product_id');

        // Query utama untuk mendapatkan entri terbaru untuk setiap product_id
        $allInhousePayments = InhousePayment::joinSub($latestInhousePayments, 'latest_payments', function ($join) {
            $join->on('inhouse_payments.product_id', '=', 'latest_payments.product_id')
                ->on('inhouse_payments.created_at', '=', 'latest_payments.latest_created_at');
        })
            ->orderBy('created_at', 'desc')
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

        // Tambahkan formatted_price ke objek product
        foreach ($allInhousePayments as $allInhousePayment) {
            if ($allInhousePayment->product) {
                $allInhousePayment->product->formatted_price = formatPrice($allInhousePayment->product->price);
            }
        }

        foreach ($allInhousePayments as $allInhousePayment) {
            $allInhousePayment->formatted_remaining_amount = formatPrice($allInhousePayment->remaining_amount);
        }

        // Kirim data pembelian ke view
        return view('user.checkout.invoice.index', compact('purchaseValidation', 'payments', 'allInhousePayments'));
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

    public function showInhouse($userId)
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }
        // Cari pembayaran in-house berdasarkan ID pengguna (user)
        $inhousePayments = InhousePayment::where('user_id', $userId)->get();

        // Periksa apakah pembayaran in-house ditemukan
        if ($inhousePayments) {
            // Jika ditemukan, ambil data pengguna terkait
            $user = User::find($userId);

            // Tambahkan formatted_price ke objek product
            foreach ($inhousePayments as $inhousePayment) {
                // Mengecek apakah objek InhousePayment memiliki properti product
                if ($inhousePayment->product) {
                    // Menambahkan formatted_nominal dan formatted_remaining_amount ke objek InhousePayment
                    $inhousePayment->formatted_nominal = formatPrice($inhousePayment->nominal);
                    $inhousePayment->formatted_remaining_amount = formatPrice($inhousePayment->remaining_amount);
                }
            }
            // Jika ditemukan, tampilkan halaman detail pembayaran in-house
            return view('user.checkout.invoice.show-inhouse-payments', compact('inhousePayments', 'user'));
        } else {
            // Jika tidak ditemukan, redirect atau tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Pembayaran in-house tidak ditemukan untuk pengguna ini.');
        }
    }

    // public function showInhouse($id)
    // {
    //     // Cari pembayaran in-house berdasarkan ID pengguna (user)
    //     $inhousePayments = InhousePayment::findOrFail($id);
    //     return view('user.checkout.invoice.show-inhouse-payments', compact('inhousePayments'));
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
