<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $picture = Picture::orderBy('created_at', 'desc')->get();
        $isDirector = Auth::guard('is_admin')->user()->level === 'director';
        return view('admin.setting.picture.index', compact('picture', 'isDirector'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima dari request
            $validatedData = $request->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000', // Validasi avatar
            ]);

            // Jika avatar diunggah, simpan avatar di penyimpanan publik
            if ($request->hasFile('picture')) {
                $picturePath = $request->file('picture')->store('pictures', 'public');

                // Simpan nama file picture ke dalam variabel $picturePath
                // $picturePath akan berisi path ke file picture di penyimpanan publik
            } else {
                $picturePath = null; // Jika tidak ada picture yang diunggah
            }

            // Buat user baru
            $picture = new Picture([
                'admin_id' => Auth::guard('is_admin')->user()->id,
                'picture' => $picturePath, // Simpan path avatar
            ]);

            // Simpan user ke dalam database
            $picture->save();

            // Kembalikan respons yang sesuai
            return redirect()->route('admin.setting-picture.index')->with('success', 'Gambar berhasil ditambahkan.');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $picture = Picture::findOrFail($id);

            // Hapus pengguna
            $picture->delete();

            return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pengguna: ' . $e->getMessage()], 500);
        }
    }
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
}
