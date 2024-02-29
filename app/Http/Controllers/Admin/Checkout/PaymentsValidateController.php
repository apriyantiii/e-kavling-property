<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaymentsValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payments::orderBy('created_at', 'desc')->get();

        $isAdmin = Auth::guard('is_admin')->user()->level === 'admin';
        return view('admin.checkout.payments-validate.index', compact('payments', 'isAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function updateStatus(Request $request, Payments $payment)
    {
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $payment->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pembayaran berhasil di update!');
    }

    public function edit(Payments $paymentId)
    {
        return view('admin.checkout.payments-validate.edit', compact('paymentId'));
    }

    public function update(Request $request, Payments $payment)
    {
        try {
            // Validasi form jika diperlukan
            $request->validate([
                'name' => 'required|string|max:255',
                'payment_date' => 'required|date',
                'type' => 'required|in:cash,inhouse,kpr',
                'home_bank' => 'required|string|max:255',
                'destination_bank' => 'required|string|max:255',
                'rekening_name' => 'required|string|max:255',
                'nominal' => 'required|integer',
                'transfer' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                'payment_description' => 'nullable|string',
                'status' => ['required', 'in:pending,approved,rejected'],
            ]);

            // Hapus bukti tf yang lama jika ada bukti tf baru diunggah
            if ($request->hasFile('transfer') && $payment->transfer) {
                Storage::delete('public/uploads/' . $payment->transfer);
            }

            // Simpan bukti tf yang baru jika ada file yang diunggah
            $tfFileName = null;
            if ($request->hasFile('transfer')) {
                $transferFile = $request->file('transfer');
                $tfFileName = 'tf_' . time() . '.' . $transferFile->getClientOriginalExtension();
                $transferFile->storeAs('public/uploads', $tfFileName);
            }

            // Update data pembayaran
            $payment->update([
                'name' => $request->input('name'),
                'payment_date' => $request->input('payment_date'),
                'type' => $request->input('type'),
                'home_bank' => $request->input('home_bank'),
                'destination_bank' => $request->input('destination_bank'),
                'rekening_name' => $request->input('rekening_name'),
                'nominal' => $request->input('nominal'),
                'transfer' => $tfFileName ?? $payment->transfer, // Gunakan nilai lama jika tidak ada file yang diunggah
                'payment_description' => $request->input('payment_description'),
                'status' => $request->input('status'),
            ]);

            // Menggunakan redirect biasa
            return redirect()->route('checkout.payment.show', $payment->id)->with('success', 'Pembayaran berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

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
    public function show(Payments $showPayment)
    {
        $isAdmin = Auth::guard('is_admin')->user()->level === 'admin';

        return view('admin.checkout.payments-validate.show', compact('showPayment', 'isAdmin'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $payments = Payments::findOrFail($id);

            // Hapus pengguna
            $payments->delete();

            return redirect()->back()->with('success', 'Pembayaran berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus Pembayaran: ' . $e->getMessage()], 500);
        }
    }
}
