<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseValidation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::find($id);
        return view('user.checkout.purchase-validation.index-checkout', compact('product'));
    }

    // public function indexWaitingValidation()
    // {
    //     $purchaseValidation = PurchaseValidation::all();
    //     return view('user.checkout.purchase-validation.waiting-validation', compact('purchaseValidation'));
    // }
    public function waitingValidate()
    {
        return view('user.checkout.purchase-validation.waiting-validate');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            // Validasi form jika diperlukan
            $request->validate([
                'name' => 'required|string|max:255',
                'nik' => 'required|integer',
                'job' => 'required|string|max:255',
                'age' => 'required|integer',
                'telpon' => 'required|string|max:255',
                'address' => 'required|string',
                'product_id' => 'required|exists:products,id', // Validasi product_id
            ]);

            // dd($request);
            // Mengambil ID pengguna yang sedang login
            $userId = Auth::id();
            $productId = $request->input('product_id');
            $product = Product::find($productId);

            // dd($product);

            // Simpan data pembelian ke dalam tabel purchase_validations
            PurchaseValidation::create([
                'user_id' => $userId,
                'product_id' => $product->id, // Menggunakan $product->id untuk mendapatkan ID produk
                'name' => $request->input('name'),
                'nik' => $request->input('nik'),
                'job' => $request->input('job'),
                'age' => $request->input('age'),
                'telpon' => $request->input('telpon'),
                'address' => $request->input('address'),
                'status' => 'pending', // Atur status sesuai kebutuhan
            ]);

            // Simpan status pembelian ke dalam session
            // session()->put('purchase_status', 'waiting_confirmation');

            // Menggunakan redirect biasa
            $redirect = redirect()->route('waiting-validate')->with('success', 'Berkas validasi berhasil dikirimkan!');
            // dd(session('success'), $redirect);

            return $redirect;
            // Menggunakan redirect biasa
            // return redirect()->route('purchase.waiting-validation')->with('success', 'Berkas validasi berhasil dikirimkan!');
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
    public function edit()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan PurchaseValidation berdasarkan ID pengguna
        $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

        return view('user.checkout.purchase-validation.edit', compact('purchaseValidation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|integer',
            'job' => 'required|string|max:255',
            'age' => 'required|integer',
            'telpon' => 'required|string|max:255',
            'address' => 'required|string',
            // 'status' => 'required|in:approved,pending',
        ]);

        // Mengambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan PurchaseValidation berdasarkan ID pengguna
        $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

        // Update data PurchaseValidation
        $purchaseValidation->update([
            'name' => $request->input('name'),
            'nik' => $request->input('nik'),
            'job' => $request->input('job'),
            'age' => $request->input('age'),
            'telpon' => $request->input('telpon'),
            'address' => $request->input('address'),
            // 'status' => $request->input('status'),
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('waiting-validate')->with('success', 'Validasi data berhasil diperbarui!');
    }
    // public function update(Request $request, PurchaseValidation $purchaseValidation)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'nik' => 'required|integer',
    //             'job' => 'required|string|max:255',
    //             'age' => 'required|integer',
    //             'telpon' => 'required|string|max:255',
    //             'address' => 'required|string',
    //             // 'status' => 'required|in:approved,pending',
    //         ]);

    //         $purchaseValidation->name = $request->name;
    //         $purchaseValidation->nik = $request->nik;
    //         $purchaseValidation->job = $request->job;
    //         $purchaseValidation->age = $request->age;
    //         $purchaseValidation->telpon = $request->telpon;
    //         $purchaseValidation->address = $request->address;
    //         // $purchaseValidation->status = $request->status;

    //         // Menyimpan data validasi pembelian yang sudah diupdate
    //         $purchaseValidation->save();

    //         // Menggunakan redirect biasa
    //         return redirect()->route('purchase.waiting-validation')->with('success', 'Data validasi pembelian berhasil diperbarui!');
    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
    //     }
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
