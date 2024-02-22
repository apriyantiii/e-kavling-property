<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::orderBy('created_at', 'desc')->get();
        return view('admin.setting.admin.index-admin', compact('admin'));
    }
    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|string|min:8',
                'gender' => 'nullable|in:male,female',
                'contact' => 'nullable|string',
                'level' => 'nullable|in:admin,director',
                'address' => 'nullable|string',
            ]);

            // Buat admin baru
            $admin = new Admin([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'gender' => $validatedData['gender'],
                'contact' => $validatedData['contact'],
                'level' => $validatedData['level'],
                'address' => $validatedData['address'],
            ]);

            // Simpan admin ke dalam database
            $admin->save();

            // Kembalikan respons yang sesuai
            return back()->with('success', 'Admin baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }
    
    public function edit(Admin $admin)
    {
        return view('admin.setting.admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:admins,email,' . $admin->id,
                'password' => 'nullable|string|min:8',
                'gender' => 'nullable|in:male,female',
                'contact' => 'nullable|string',
                'level' => 'required|in:admin,director',
                'address' => 'nullable|string',
            ]);

            $admin->update($request->all());

            return redirect()->route('admin.setting-admin.index-admin')->with('success', 'Data admin berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $admin = Admin::findOrFail($id);

            // Hapus pengguna
            $admin->delete();

            return redirect()->back()->with('success', 'Admin berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus admin: ' . $e->getMessage()], 500);
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


    /**
     * Update the specified resource in storage.
     */

}
