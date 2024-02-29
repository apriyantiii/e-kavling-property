<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\PurchaseValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DataValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validate = PurchaseValidation::orderBy('created_at', 'desc')->get();
        $isDirector = Auth::guard('is_admin')->user()->level === 'director';

        return view('admin.checkout.data-validate.index', compact('validate', 'isDirector'));
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

    public function edit(PurchaseValidation $validateId)
    {
        return view('admin.checkout.data-validate.edit', compact('validateId'));
    }

    public function update(Request $request, PurchaseValidation $purchaseValidation)
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
                'status' => ['required', 'in:pending,approved,rejected'],
                // tambahkan validasi lain sesuai kebutuhan
            ]);
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
                'status' => $request->input('status'),
                // tambahkan field lain yang perlu diupdate
            ]);
            // Redirect atau tampilkan pesan sukses
            return redirect()->route('checkout.validate.show', $purchaseValidation->id)->with('success', 'Validasi data berhasil diperbarui!');
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
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
}
