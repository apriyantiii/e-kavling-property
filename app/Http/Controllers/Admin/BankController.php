<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::orderBy('created_at', 'desc')->get();
        $isAdmin = Auth::guard('is_admin')->user()->level === 'admin';

        return view('admin.bank.index', compact('banks', 'isAdmin'));
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
                'name' => 'required|string',
                'bank' => 'required|string',
                'rekening' => 'required|string',
            ]);
            $bank = new Bank([
                'admin_id' => Auth::guard('is_admin')->user()->id,
                'name' => $request->input('name'),
                'bank' => $request->input('bank'),
                'rekening' => $request->input('rekening'),
            ]);

            $bank->save();

            return redirect()->route('admin.bank')->with('success', 'Data Rekening baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    // public function update(Request $request, Admin $admin)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string',
    //             'email' => 'required|email|unique:admins,email,' . $admin->id,
    //             'password' => 'nullable|string|min:8',
    //             'gender' => 'nullable|in:male,female',
    //             'contact' => 'nullable|string',
    //             'level' => 'required|in:admin,director',
    //             'address' => 'nullable|string',
    //         ]);

    //         $admin->update($request->all());

    //         return redirect()->route('admin.setting-admin.index')->with('success', 'Data admin berhasil diperbarui.');
    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
    //     }
    // }

    public function update(Request $request, Bank $bank)
    {
        try {
            // Validasi data input
            $request->validate([
                'bank' => 'required',
                'name' => 'required',
                'rekening' => 'required',
            ]);

            // Update data pengguna
            $bank->update([
                'name' => $request['name'],
                'bank' => $request['bank'],
                'rekening' => $request['rekening'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Data bank berhasil diperbarui');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $banks = Bank::findOrFail($id);

            // Hapus pengguna
            $banks->delete();

            return redirect()->back()->with('success', 'Rekening berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus Rekening: ' . $e->getMessage()], 500);
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
}
