<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Fungsi formatPrice 
        if (!function_exists('formatPrice')) {
            function formatPrice($price)
            {
                return 'Rp ' . number_format($price, 0, ',', '.');
            }
        }

        $allProducts = Product::all();

        // Memformat harga menggunakan fungsi formatPrice untuk setiap produk
        $allProducts->transform(function ($product) {
            $product->formatted_price = formatPrice($product->price);
            return $product;
        });

        return view('user.properti', compact('allProducts'));
    }
    public function adminHome()
    {
        return view('admin.index');
    }
    public function directorHome()
    {
        return view('director.index');
    }
}
