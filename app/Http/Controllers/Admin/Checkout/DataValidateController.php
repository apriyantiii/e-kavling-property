<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\PurchaseValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validate = PurchaseValidation::all();

        return view('admin.checkout.data-validate.index', compact('validate'));
    }

    public function updateStatus(Request $request, PurchaseValidation $purchaseValidate)
    {
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $purchaseValidate->update(['status' => $request->status]);

        // Set session 'purchase_status' sesuai dengan status pembelian yang baru
        Session::put('purchase_status', $request->status);

        return redirect()->back()->with('success', 'Status berkas berhasil diubah!');
    }

    public function show(PurchaseValidation $showValidate)
    {
        return view('admin.checkout.data-validate.show', compact('showValidate'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $validate = PurchaseValidation::findOrFail($id);

            // Hapus pengguna
            $validate->delete();

            return redirect()->back()->with('success', 'Berkas Validasi berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus Berkas Validasi: ' . $e->getMessage()], 500);
        }
    }
}
