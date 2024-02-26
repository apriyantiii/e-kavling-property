<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseValidation;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCounts = Wishlist::select(
            'product_id',
            DB::raw('COUNT(user_id) as user_count'),
            DB::raw('GROUP_CONCAT(DISTINCT users.name) as user_names')
        )
            ->orderBy('product_id', 'desc') // Mengurutkan berdasarkan product_id
            ->groupBy('product_id') // Mengelompokkan hasil berdasarkan product_id
            ->leftJoin('users', 'wishlists.user_id', '=', 'users.id') // Gabungkan dengan tabel users
            ->with(['product']) // Hanya perlu menggabungkan dengan tabel products jika ingin mendapatkan data produk terkait
            ->get();

        return view('admin.wishlist.index', compact('userCounts'));
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
    public function destroy(string $id)
    {
        //
    }
}
