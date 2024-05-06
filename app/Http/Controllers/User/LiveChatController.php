<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan user yang sedang login
        $currentUser = Auth::user();

        $userChats = Chat::where('user_id', $currentUser->id)
            ->where(function ($query) use ($currentUser) {
                $query->whereNull('admin_id')
                    ->orWhere('admin_id', '<>', $currentUser->id);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        // Mengambil semua balasan dari admin yang ditujukan kepada pengguna yang sedang login
        $adminChats = Chat::whereNotNull('admin_id')
            ->where('user_id', $currentUser->id) // Hanya balasan yang ditujukan kepada pengguna yang sedang login
            ->orderBy('created_at', 'asc')
            ->get();

        $allChats = $userChats->merge($adminChats)->sortBy('created_at');

        return view('user.live-chat.index', compact('allChats'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'product_id' => 'nullable|exists:products,id',
                'message' => 'required|string',
            ]);

            // Mengambil ID pengguna yang sedang login
            $userId = Auth::id();
            $productId = $request->input('product_id');

            // Create a new Chat instance and fill it with the validated data
            Chat::create([
                'user_id' => $userId,
                // 'product_id' => $product->id, // Menggunakan $product->id untuk mendapatkan ID produk
                'message' => $request->input('message'),
                'status' => 'accept',
            ]);

            // Menggunakan redirect biasa
            $redirect = redirect()->route('user.live-chat')->with('success', 'Pesan Terkirim!');
            // dd(session('success'), $redirect);

            return $redirect;
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }

    public function destroy($chatId)
    {
        try {
            // Cari chat berdasarkan ID
            $chat = Chat::findOrFail($chatId);

            // Hapus chat
            $chat->delete();

            // Redirect kembali ke halaman sebelumnya
            return back()->with('success', 'Pesan berhasil dihapus!');
        } catch (\Exception $e) {
            // Tampilkan pesan exception untuk debugging
            dd($e->getMessage());
        }
    }

    public function storeChat(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'product_id' => 'nullable|exists:products,id',
                'message' => 'required|string',
            ]);

            // Mengambil ID pengguna yang sedang login
            $userId = Auth::id();
            $productId = $request->input('product_id');
            $product = Product::find($productId);

            // Create a new Chat instance and fill it with the validated data
            Chat::create([
                'user_id' => $userId,
                'product_id' => $product->id, // Menggunakan $product->id untuk mendapatkan ID produk
                'message' => $request->input('message'),
                'status' => 'accept',
            ]);

            // Menggunakan redirect biasa
            $redirect = redirect()->route('user.live-chat')->with('success', 'Pesan Terkirim!');
            // dd(session('success'), $redirect);

            return $redirect;
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

    /**
     * Remove the specified resource from storage.
     */
}
