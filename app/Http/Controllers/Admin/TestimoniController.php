<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonis = Testimoni::all();
        $isDirector = Auth::guard('is_admin')->user()->level === 'director';

        return view('admin.testimoni.index', compact('testimonis', 'isDirector'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'nullable|string',
                'profesi' => 'required|string',
                'message' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi avatar

            ]);

            // Jika foto diunggah, simpan foto di penyimpanan publik
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');

                // Simpan nama file foto ke dalam variabel $photoPath
                // $photoPath akan berisi path ke file foto di penyimpanan publik
            } else {
                $photoPath = null; // Jika tidak ada foto yang diunggah
            }

            $testimoni = new Testimoni([
                'admin_id' => Auth::guard('is_admin')->user()->id,
                'name' => $request->input('name'),
                'profesi' => $request->input('profesi'),
                'message' => $request->input('message'),
                'photo' => $photoPath,
            ]);

            $testimoni->save();

            return redirect()->route('admin.testimoni')->with('success', 'Berhasil menambahkan testimoni!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    public function destroy($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $testimonis = Testimoni::findOrFail($id);

            // Hapus pengguna
            $testimonis->delete();

            return redirect()->back()->with('success', 'Testimoni berhasil dihapus.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus Testimoni: ' . $e->getMessage()], 500);
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
