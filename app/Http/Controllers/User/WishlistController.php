<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Menampilkan wishlist berdasarkan user_id yang sedang login dan yang tidak ada di tabel pembayaran
        $wishlist = Wishlist::with('product')
            ->where('user_id', $user->id)
            ->whereNotIn('product_id', function ($query) {
                $query->select('product_id')
                    ->from('purchase_validations');
            })
            ->get();


        // Menambahkan formatted_price untuk setiap item di koleksi
        $wishlist->each(function ($item) {
            $item->product->formatted_price = formatPrice($item->product->price);
        });

        return view('user.wishlist.index', compact('wishlist'));
    }

    public function destroy(Wishlist $wishlist)
    {
        // Hapus kategori produk dari database
        $wishlist->delete();

        return redirect()->route('wishlist.index')->with('success', 'Produk berhasil dihapus dari wishlist!');
        // set flash message
        return with(['type' => 'success', 'delay' => 2500, 'message' => 'Produk berhasil dihapus dari wishlist!']);
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
        // Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk menambahkan produk ke wishlist.');
        }

        // Validasi request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Tambahkan produk ke wishlist
        auth()->user()->wishlist()->create([
            'product_id' => $request->product_id,
        ]);

        return redirect()->route('wishlist.index')->with('success', 'Produk berhasil ditambahkan ke wishlist!');
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
