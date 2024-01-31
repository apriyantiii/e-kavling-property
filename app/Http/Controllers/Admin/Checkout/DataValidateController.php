<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\PurchaseValidation;
use Illuminate\Http\Request;

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

    public function update(Request $request, PurchaseValidation $purchaseValidate)
    {

        $request->validate([
            'status' => 'required|in:approved,pending',
        ]);

        $purchaseValidate->status = $request->input('status');

        // Perbarui status pembelian pada session
        session()->put('purchase_status', $request->input('status'));

        $purchaseValidate->save();
        return redirect()->route('checkout.data-validate')->with('success', 'Status validasi berkas berhasil di update!');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
