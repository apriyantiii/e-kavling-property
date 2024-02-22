<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class PaymentsValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payments::orderBy('created_at', 'desc')->get();
        return view('admin.checkout.payments-validate.index', compact('payments'));
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
        return view('admin.checkout.payments-validate.show', compact('showPayment'));
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
