<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseValidation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function waitingValidate($id)
    {
        $waitingValidate = PurchaseValidation::findOrFail($id); // Mengambil data validasi berdasarkan ID
        return view('user.checkout.purchase-validation.waiting-validate', compact('waitingValidate'));
    }

    public function rejectedValidate()
    {
        return view('user.checkout.purchase-validation.waiting-rejected');
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
                'kk_file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                'ktp_file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                'g-recaptcha-response' => 'required|captcha',
            ]);

            // Mengambil ID pengguna yang sedang login
            $userId = Auth::id();
            $productId = $request->input('product_id');
            $product = Product::find($productId);

            // Simpan file KK
            $kkFileName = null;
            if ($request->hasFile('kk_file')) {
                $kkFile = $request->file('kk_file');
                $kkFileName = 'kk_' . time() . '.' . $kkFile->getClientOriginalExtension();
                $kkFile->storeAs('public/uploads', $kkFileName);
            }

            // Simpan file KTP
            $ktpFileName = null;
            if ($request->hasFile('ktp_file')) {
                $ktpFile = $request->file('ktp_file');
                $ktpFileName = 'ktp_' . time() . '.' . $ktpFile->getClientOriginalExtension();
                $ktpFile->storeAs('public/uploads', $ktpFileName);
            }

            // Simpan data pembelian ke dalam tabel purchase_validations
            $purchaseValidation = PurchaseValidation::create([
                'user_id' => $userId,
                'product_id' => $product->id, // Menggunakan $product->id untuk mendapatkan ID produk
                'name' => $request->input('name'),
                'nik' => $request->input('nik'),
                'job' => $request->input('job'),
                'age' => $request->input('age'),
                'telpon' => $request->input('telpon'),
                'address' => $request->input('address'),
                'status' => 'pending', // Atur status sesuai kebutuhan
                'kk_file' => $kkFileName,
                'ktp_file' => $ktpFileName,
            ]);

            // Simpan status pembelian ke dalam session
            session()->put('purchase_status', 'waiting_confirmation');

            // Menggunakan redirect dengan route 'waiting-validate' dan ID dari pembelian yang baru dibuat
            return redirect()->route('waiting-validate', $purchaseValidation->id)->with('success', 'Berkas validasi berhasil dikirimkan!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    public function edit()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan PurchaseValidation berdasarkan ID pengguna
        $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

        return view('user.checkout.purchase-validation.edit', compact('purchaseValidation'));
    }

    public function update(Request $request)
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
                'kk_file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                'ktp_file' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
                // 'status' => 'required|in:approved,pending',
            ]);

            // Mengambil ID pengguna yang sedang login
            $userId = Auth::id();

            // Mendapatkan PurchaseValidation berdasarkan ID pengguna
            $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

            // Hapus file KK yang lama jika ada file KK baru diunggah
            if ($request->hasFile('kk_file') && $purchaseValidation->kk_file) {
                Storage::delete('public/uploads/' . $purchaseValidation->kk_file);
            }

            // Hapus file KTP yang lama jika ada file KTP baru diunggah
            if ($request->hasFile('ktp_file') && $purchaseValidation->ktp_file) {
                Storage::delete('public/uploads/' . $purchaseValidation->ktp_file);
            }

            // Simpan file KK yang baru
            $kkFileName = null;
            if ($request->hasFile('kk_file')) {
                $kkFile = $request->file('kk_file');
                $kkFileName = 'kk_' . time() . '.' . $kkFile->getClientOriginalExtension();
                $kkFile->storeAs('public/uploads', $kkFileName);
            }

            // Simpan file KTP yang baru
            $ktpFileName = null;
            if ($request->hasFile('ktp_file')) {
                $ktpFile = $request->file('ktp_file');
                $ktpFileName = 'ktp_' . time() . '.' . $ktpFile->getClientOriginalExtension();
                $ktpFile->storeAs('public/uploads', $ktpFileName);
            }

            // Update data PurchaseValidation
            $purchaseValidation->update([
                'name' => $request->input('name'),
                'nik' => $request->input('nik'),
                'job' => $request->input('job'),
                'age' => $request->input('age'),
                'telpon' => $request->input('telpon'),
                'address' => $request->input('address'),
                'kk_file' => $kkFileName,
                'ktp_file' => $ktpFileName,
                // 'status' => $request->input('status'),
            ]);

            // Redirect atau tampilkan pesan sukses
            return redirect()->route('waiting-validate', $purchaseValidation->id)->with('success', 'Validasi data berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
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

    // public function update(Request $request)
    // {
    //     // Validasi form jika diperlukan
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'nik' => 'required|integer',
    //         'job' => 'required|string|max:255',
    //         'age' => 'required|integer',
    //         'telpon' => 'required|string|max:255',
    //         'address' => 'required|string',
    //         // 'status' => 'required|in:approved,pending',
    //     ]);

    //     // Mengambil ID pengguna yang sedang login
    //     $userId = Auth::id();

    //     // Mendapatkan PurchaseValidation berdasarkan ID pengguna
    //     $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

    //     // Update data PurchaseValidation
    //     $purchaseValidation->update([
    //         'name' => $request->input('name'),
    //         'nik' => $request->input('nik'),
    //         'job' => $request->input('job'),
    //         'age' => $request->input('age'),
    //         'telpon' => $request->input('telpon'),
    //         'address' => $request->input('address'),
    //         // 'status' => $request->input('status'),
    //     ]);

    //     // Redirect atau tampilkan pesan sukses
    //     return redirect()->route('waiting-validate')->with('success', 'Validasi data berhasil diperbarui!');
    // }
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
