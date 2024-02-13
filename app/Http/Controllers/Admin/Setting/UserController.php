<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.setting.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'gender' => 'required|in:male,female',
                'contact' => 'required|string',
                'address' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi avatar
            ]);

            // Jika avatar diunggah, simpan avatar di penyimpanan publik
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');

                // Simpan nama file avatar ke dalam variabel $avatarPath
                // $avatarPath akan berisi path ke file avatar di penyimpanan publik
            } else {
                $avatarPath = null; // Jika tidak ada avatar yang diunggah
            }

            // Buat user baru
            $user = new User([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'avatar' => $avatarPath, // Simpan path avatar
                'gender' => $validatedData['gender'],
                'role' => 'user', // Atau default role sesuai kebutuhan
                'contact' => $validatedData['contact'],
                'address' => $validatedData['address'],
            ]);

            // Simpan user ke dalam database
            $user->save();

            // Kembalikan respons yang sesuai
            return redirect()->route('admin.setting-user.index')->with('success', 'Data pengguna berhasil ditambahkan.');
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
    public function edit(User $user)
    {
        return view('admin.setting.user.edit', compact('user'));
    }
    // public function edit(User $users)
    // {
    //     return view('admin.setting.user.edit', compact('users'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8',
                'gender' => 'required|in:male,female',
                'contact' => 'required|string',
                'address' => 'required|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi avatar
            ]);

            // Jika avatar diunggah, simpan avatar di penyimpanan publik
            if ($request->hasFile('avatar')) {
                // Hapus avatar lama sebelum menyimpan yang baru
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }

                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            } else {
                // Jika tidak ada avatar yang diunggah, gunakan avatar yang sudah ada
                $avatarPath = $user->avatar;
            }

            // Update data pengguna
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'gender' => $validatedData['gender'],
                'contact' => $validatedData['contact'],
                'address' => $validatedData['address'],
                'avatar' => $avatarPath, // Simpan path avatar baru atau yang sudah ada
            ]);

            // Kembalikan respons yang sesuai
            return redirect()->route('admin.setting-user.index')->with('success', 'Data pengguna berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Hapus pengguna
            $user->delete();

            return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pengguna: ' . $e->getMessage()], 500);
        }
    }
}
