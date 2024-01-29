<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\PurchaseValidation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.checkout.purchase-validation.index');
    }

    public function indexWaitingValidation()
    {
        $purchaseValidation = PurchaseValidation::all();
        return view('user.checkout.purchase-validation.waiting-validation', compact('purchaseValidation'));
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
            $request->validate([
                'name' => 'required|string|max:255',
                'nik' => 'required|integer',
                'job' => 'required|string|max:255',
                'age' => 'required|integer',
                'telpon' => 'required|string|max:255',
                'address' => 'required|string',
                // 'status' => 'required|in:approved,pending',
            ]);

            $purchaseValidation = new PurchaseValidation();
            $purchaseValidation->user_id = Auth::user()->id;
            $purchaseValidation->name = $request->name;
            $purchaseValidation->nik = $request->nik;
            $purchaseValidation->job = $request->job;
            $purchaseValidation->age = $request->age;
            $purchaseValidation->telpon = $request->telpon;
            $purchaseValidation->address = $request->address;
            // $purchaseValidation->status = $request->status;

            // $purchaseValidation = new PurchaseValidation([
            //     'user_id' => Auth::user()->id,
            //     'name' => 'required|string|max:255',
            //     'nik' => 'required|integer',
            //     'job' => 'required|string|max:255',
            //     'age' => 'required|integer',
            //     'telpon' => 'required|string|max:255',
            //     'address' => 'required|string',
            // ]);

            // Menyimpan data validasi pembelian
            $purchaseValidation->save();

            // Simpan status pembelian ke dalam session
            session()->put('purchase_status', 'waiting_confirmation');

            // Menggunakan redirect biasa
            return redirect()->route('purchase.waiting-validation')->with('success', 'Berkas validasi berhasil dikirimkan!');
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
    public function edit(PurchaseValidation $purchaseValidation)
    {
        return view('user.checkout.purchase-validation.edit', compact('purchaseValidation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseValidation $purchaseValidation)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'nik' => 'required|integer',
                'job' => 'required|string|max:255',
                'age' => 'required|integer',
                'telpon' => 'required|string|max:255',
                'address' => 'required|string',
                // 'status' => 'required|in:approved,pending',
            ]);

            $purchaseValidation->name = $request->name;
            $purchaseValidation->nik = $request->nik;
            $purchaseValidation->job = $request->job;
            $purchaseValidation->age = $request->age;
            $purchaseValidation->telpon = $request->telpon;
            $purchaseValidation->address = $request->address;
            // $purchaseValidation->status = $request->status;

            // Menyimpan data validasi pembelian yang sudah diupdate
            $purchaseValidation->save();

            // Menggunakan redirect biasa
            return redirect()->route('purchase.waiting-validation')->with('success', 'Data validasi pembelian berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
