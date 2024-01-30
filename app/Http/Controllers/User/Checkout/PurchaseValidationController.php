<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseValidation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::find($id);
        return view('user.checkout.purchase-validation.index', compact('product'));
    }

    public function indexWaitingValidation()
    {
        $purchaseValidation = PurchaseValidation::all();
        return view('user.checkout.purchase-validation.waiting-validation', compact('purchaseValidation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    // Validasi request
    // $request->validate([
    //     'product_id' => 'required|exists:products,id',
    // ]);

    // // Tambahkan produk ke wishlist
    // auth()->user()->wishlist()->create([
    //     'product_id' => $request->product_id,
    // ]);
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     try {
    //         // Validasi form jika diperlukan
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'nik' => 'required|integer',
    //             'job' => 'required|string|max:255',
    //             'age' => 'required|integer',
    //             'telpon' => 'required|string|max:255',
    //             'address' => 'required|string',
    //             'product_id' => 'required|exists:products,id',
    //         ]);

    //         // Mengambil ID pengguna yang sedang login
    //         $userId = Auth::id();

    //         // Membuat objek PurchaseValidation dengan relasi Product
    //         $purchaseValidation = new PurchaseValidation([
    //             'user_id' => $userId,
    //             'name' => $request->input('name'),
    //             'nik' => $request->input('nik'),
    //             'job' => $request->input('job'),
    //             'age' => $request->input('age'),
    //             'telpon' => $request->input('telpon'),
    //             'address' => $request->input('address'),
    //             'status' => 'pending',
    //         ]);

    //         // Menghubungkan objek PurchaseValidation dengan objek Product
    //         $purchaseValidation->purchaseValidations()->associate($request->input('product_id'));

    //         // Menyimpan data ke dalam tabel purchase_validations
    //         $purchaseValidation->save();

    //         // Simpan status pembelian ke dalam session
    //         session()->put('purchase_status', 'waiting_confirmation');

    //         // Menggunakan redirect biasa
    //         return redirect()->route('purchase.waiting-validation')->with('success', 'Berkas validasi berhasil dikirimkan!');
    //     } catch (\Exception $e) {
    //         // Tampilkan pesan exception untuk debugging
    //         dd($e->getMessage());
    //     }
    // }


    // public function store(Request $request)
    // {
    //     try {
    //         // Validasi form jika diperlukan
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'nik' => 'required|integer',
    //             'job' => 'required|string|max:255',
    //             'age' => 'required|integer',
    //             'telpon' => 'required|string|max:255',
    //             'address' => 'required|string',
    //             // 'product_id' => 'required|exists:products,id', // Menambah validasi product_id
    //         ]);

    //         // Mengambil ID pengguna yang sedang login
    //         $userId = Auth::id();

    //         // // Mendapatkan informasi produk
    //         // $product = Product::find($request->input('product_id'));

    //         // // Periksa apakah produk ditemukan
    //         // if ($product === null) {
    //         //     // Handle jika produk tidak ditemukan
    //         //     return redirect()->route('purchase.waiting-validation')->with('error', 'Produk tidak ditemukan.');
    //         // }

    //         // Simpan data pembelian ke dalam tabel purchase_validations
    //         auth()->user()->purchaseValidations()->create([
    //             'user_id' => $userId,
    //             'product_id' => $request->product_id,
    //             'name' => $request->input('name'),
    //             'nik' => $request->input('nik'),
    //             'job' => $request->input('job'),
    //             'age' => $request->input('age'),
    //             'telpon' => $request->input('telpon'),
    //             'address' => $request->input('address'),
    //             'status' => 'pending', // Atur status sesuai kebutuhan
    //         ]);

    //         // Simpan status pembelian ke dalam session
    //         session()->put('purchase_status', 'waiting_confirmation');

    //         // Menggunakan redirect biasa
    //         return redirect()->route('purchase.waiting-validation')->with('success', 'Berkas validasi berhasil dikirimkan!');
    //     } catch (\Exception $e) {
    //         // Tampilkan pesan exception untuk debugging
    //         dd($e->getMessage());
    //     }
    // }

    // public function store(Request $request)
    // {
    //     try {
    //         // Validasi form jika diperlukan
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'nik' => 'required|integer',
    //             'job' => 'required|string|max:255',
    //             'age' => 'required|integer',
    //             'telpon' => 'required|string|max:255',
    //             'address' => 'required|string',
    //         ]);

    //         // Mengambil ID pengguna yang sedang login
    //         $userId = Auth::id();
    //         $productId = $request->input('product_id');

    //         // Simpan data pembelian ke dalam tabel purchase_validations
    //         PurchaseValidation::create([
    //             'user_id' => $userId,
    //             'product_id' => Product::find($productId),
    //             'name' => $request->input('name'),
    //             'nik' => $request->input('nik'),
    //             'job' => $request->input('job'),
    //             'age' => $request->input('age'),
    //             'telpon' => $request->input('telpon'),
    //             'address' => $request->input('address'),
    //             'status' => 'pending', // Atur status sesuai kebutuhan
    //         ]);

    //         // Simpan status pembelian ke dalam session
    //         session()->put('purchase_status', 'waiting_confirmation');

    //         // Menggunakan redirect biasa
    //         return redirect()->route('purchase.waiting-validation')->with('success', 'Berkas validasi berhasil dikirimkan!');
    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
    //     }
    // }

    public function store(Request $request)
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
                'product_id' => 'required|exists:products,id', // Validasi product_id
            ]);

            // dd($request);
            // Mengambil ID pengguna yang sedang login
            $userId = Auth::id();
            $productId = $request->input('product_id');
            $product = Product::find($productId);

            // dd($product);

            // Simpan data pembelian ke dalam tabel purchase_validations
            PurchaseValidation::create([
                'user_id' => $userId,
                'product_id' => $product->id, // Menggunakan $product->id untuk mendapatkan ID produk
                'name' => $request->input('name'),
                'nik' => $request->input('nik'),
                'job' => $request->input('job'),
                'age' => $request->input('age'),
                'telpon' => $request->input('telpon'),
                'address' => $request->input('address'),
                'status' => 'pending', // Atur status sesuai kebutuhan
            ]);

            // Simpan status pembelian ke dalam session
            session()->put('purchase_status', 'waiting_confirmation');

            // Menggunakan redirect biasa
            return redirect()->route('purchase.waiting-validation')->with('success', 'Berkas validasi berhasil dikirimkan!');
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
    public function edit()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan PurchaseValidation berdasarkan ID pengguna
        $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

        return view('user.checkout.purchase-validation.edit', compact('purchaseValidation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|integer',
            'job' => 'required|string|max:255',
            'age' => 'required|integer',
            'telpon' => 'required|string|max:255',
            'address' => 'required|string',
            // 'status' => 'required|in:approved,pending',
        ]);

        // Mengambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan PurchaseValidation berdasarkan ID pengguna
        $purchaseValidation = PurchaseValidation::where('user_id', $userId)->first();

        // Update data PurchaseValidation
        $purchaseValidation->update([
            'name' => $request->input('name'),
            'nik' => $request->input('nik'),
            'job' => $request->input('job'),
            'age' => $request->input('age'),
            'telpon' => $request->input('telpon'),
            'address' => $request->input('address'),
            // 'status' => $request->input('status'),
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('purchase.waiting-validation')->with('success', 'Validasi data berhasil diperbarui!');
    }
    // public function update(Request $request, PurchaseValidation $purchaseValidation)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'nik' => 'required|integer',
    //             'job' => 'required|string|max:255',
    //             'age' => 'required|integer',
    //             'telpon' => 'required|string|max:255',
    //             'address' => 'required|string',
    //             // 'status' => 'required|in:approved,pending',
    //         ]);

    //         $purchaseValidation->name = $request->name;
    //         $purchaseValidation->nik = $request->nik;
    //         $purchaseValidation->job = $request->job;
    //         $purchaseValidation->age = $request->age;
    //         $purchaseValidation->telpon = $request->telpon;
    //         $purchaseValidation->address = $request->address;
    //         // $purchaseValidation->status = $request->status;

    //         // Menyimpan data validasi pembelian yang sudah diupdate
    //         $purchaseValidation->save();

    //         // Menggunakan redirect biasa
    //         return redirect()->route('purchase.waiting-validation')->with('success', 'Data validasi pembelian berhasil diperbarui!');
    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
    //     }
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
