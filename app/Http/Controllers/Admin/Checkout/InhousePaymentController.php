<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\InhousePayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InhousePaymentController extends Controller
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
        // Subquery untuk mendapatkan entri terbaru untuk setiap user_id
        $latestInhousePayments = InhousePayment::select('user_id', 'product_id', DB::raw('MAX(created_at) as latest_created_at'))
            ->groupBy('user_id', 'product_id');

        // Query utama untuk mendapatkan entri terbaru untuk setiap user_id
        $allInhousePayments = InhousePayment::joinSub($latestInhousePayments, 'latest_payments', function ($join) {
            $join->on('inhouse_payments.user_id', '=', 'latest_payments.user_id')
                ->on('inhouse_payments.created_at', '=', 'latest_payments.latest_created_at');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        // Tambahkan formatted_price ke objek product
        foreach ($allInhousePayments as $allInhousePayment) {
            if ($allInhousePayment->product) {
                $allInhousePayment->product->formatted_price = formatPrice($allInhousePayment->product->price);
            }
        }

        foreach ($allInhousePayments as $allInhousePayment) {
            $allInhousePayment->formatted_remaining_amount = formatPrice($allInhousePayment->remaining_amount);
        }

        return view('admin.checkout.inhouse-payment.index', compact('allInhousePayments'));
    }

    // Fungsi bantu untuk meng-format nominal
    private function formatNominal($nominal)
    {
        return 'Rp ' . number_format($nominal, 0, ',', '.');
    }

    public function show($userId, $productId)
    {
        // Cari pembayaran in-house berdasarkan ID pengguna (user)
        $inhousePayments = InhousePayment::where('user_id', $userId)
            ->where('product_id', $productId)
            ->get();
        // $inhousePayments->formatted_nominal = $this->formatNominal($inhousePayments->nominal);

        // Periksa apakah pembayaran in-house ditemukan
        if ($inhousePayments) {
            // Jika ditemukan, ambil data pengguna terkait
            $user = User::find($userId);

            // Format nominal untuk setiap pembayaran
            foreach ($inhousePayments as $inhousePayment) {
                $inhousePayment->formatted_nominal = $this->formatNominal($inhousePayment->nominal);
            }

            $isAdmin = Auth::guard('is_admin')->user()->level === 'admin';

            // Jika ditemukan, tampilkan halaman detail pembayaran in-house
            return view('admin.checkout.inhouse-payment.show', compact('inhousePayments', 'user', 'isAdmin'));
        } else {
            // Jika tidak ditemukan, redirect atau tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'Pembayaran in-house tidak ditemukan untuk pengguna ini.');
        }
    }

    public function showInhouse($id)
    {
        // Cari pembayaran in-house berdasarkan ID pengguna (user)
        $inhousePayments = InhousePayment::findOrFail($id);
        // Format nominal untuk setiap pembayaran
        $inhousePayments->formatted_nominal = $this->formatNominal($inhousePayments->nominal);

        $inhousePayments->formatted_remaining_amount = $this->formatNominal($inhousePayments->remaining_amount);


        if ($inhousePayments->product) {
            // Menambahkan formatted_nominal dan formatted_remaining_amount ke objek InhousePayments
            $inhousePayments->formatted_price = $this->formatNominal($inhousePayments->product->price);
        }
        $isAdmin = Auth::guard('is_admin')->user()->level === 'admin';
        return view('admin.checkout.inhouse-payment.detail-inhouse', compact('inhousePayments', 'isAdmin'));
    }

    public function destroy($id)
    {
        try {
            // Temukan pembayaran in-house berdasarkan ID
            $inhousePayments = InhousePayment::findOrFail($id);

            // Simpan tipe pembayaran in-house sebelum dihapus
            $paymentType = $inhousePayments->type;

            // Hapus pembayaran in-house
            $inhousePayments->delete();

            return redirect()->back()->with('success', 'Pembayaran inhouse dengan pembayaran ' . $paymentType . ' berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pembayaran inhouse: ' . $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            // Temukan pembayaran in-house berdasarkan ID
            $inhousePayment = InhousePayment::findOrFail($id);

            // Validasi request
            $request->validate([
                'status' => 'required|in:pending,approved,rejected'
            ]);

            // Perbarui status pembayaran in-house
            $inhousePayment->status = $request->status;
            $inhousePayment->save();

            return redirect()->back()->with('success', 'Status pembayaran in-house berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failure', 'Gagal memperbarui status pembayaran in-house: ' . $e->getMessage());
        }
    }

    public function edit(InhousePayment $inhousePaymentId)
    {
        return view('admin.checkout.inhouse-payment.edit', compact('inhousePaymentId'));
    }

    public function update(Request $request, InhousePayment $inhousePayment)
    {
        try {
            // Validasi form jika diperlukan
            $request->validate([
                'name' => 'required|string|max:255',
                'payment_date' => 'required|date',
                'payment_type' => 'required|string',
                'home_bank' => 'required|string|max:255',
                'tenor' => 'required|string',
                'destination_bank' => 'required|string|max:255',
                'rekening_name' => 'required|string|max:255',
                'nominal' => 'required|integer',
                'transfer' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                'payment_description' => 'nullable|string',
                'status' => ['required', 'in:pending,approved,rejected'],
            ]);

            // Hapus bukti tf yang lama jika ada bukti tf baru diunggah
            if ($request->hasFile('transfer') && $inhousePayment->transfer) {
                Storage::delete('public/uploads/' . $inhousePayment->transfer);
            }

            // Simpan bukti tf yang baru jika ada file yang diunggah
            $tfFileName = null;
            if ($request->hasFile('transfer')) {
                $transferFile = $request->file('transfer');
                $tfFileName = 'tf_' . time() . '.' . $transferFile->getClientOriginalExtension();
                $transferFile->storeAs('public/uploads', $tfFileName);
            }

            // Update data pembayaran
            $inhousePayment->update([
                'name' => $request->input('name'),
                'payment_date' => $request->input('payment_date'),
                'payment_type' => $request->input('payment_type'),
                'home_bank' => $request->input('home_bank'),
                'tenor' => $request->input('tenor'),
                'destination_bank' => $request->input('destination_bank'),
                'rekening_name' => $request->input('rekening_name'),
                'nominal' => $request->input('nominal'),
                'transfer' => $tfFileName ?? $inhousePayment->transfer, // Gunakan nilai lama jika tidak ada file yang diunggah
                'payment_description' => $request->input('payment_description'),
                'status' => $request->input('status'),
            ]);

            // Menggunakan redirect biasa
            return redirect()->route('admin.checkout.inhouse-payments.detail', $inhousePayment->id)->with('success', 'Pembayaran inhouse berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    // public function destroy($id)
    // {
    //     try {
    //         // Temukan pengguna berdasarkan ID
    //         $inhousePayments = InhousePayment::findOrFail($id);

    //         // Hapus pengguna
    //         $inhousePayments->delete();

    //         return redirect()->back()->with('success', 'Pembayaran inhouse yang (ini tampilin type) berhasil dihapus.');
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Gagal menghapus admin: ' . $e->getMessage()], 500);
    //     }
    // }

    // public function show($id)
    // {
    //     $inhousePayments = InhousePayment::findOrFail($id);
    //     // dd($inhousePayments);
    //     return view('admin.checkout.inhouse-payment.show', compact('inhousePayments'));
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

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
