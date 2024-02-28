<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use PharIo\Manifest\Author;

// use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use AuthenticatesUsers;
    protected $guard = 'is_admin';
    protected $redirectTo = 'admin/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return auth()->guard('is_admin');
    }

    public function loginForm()
    {
        if (auth()->guard('is_admin')->user()) {
            return back();
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('is_admin')->attempt($credentials)) {
            // Otentikasi Admin berhasil
            $user = auth()->guard('is_admin')->user();

            $level = $user->level == 'admin' ? 'Admin' : 'Direktur';
            return redirect()->intended('/admin/home')->with('success', 'Anda berhasil login sebagai ' . $level);
        } else {
            // Otentikasi gagal, arahkan kembali ke halaman masuk dengan pesan kesalahan
            return back()->withInput()->withErrors(['email' => 'Email atau password salah']);
        }
    }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (auth()->guard('is_admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $user = auth()->guard('is_admin')->user();
    //         $level = $user->level == 'admin' ? 'Admin' : 'Direktur';
    //         return redirect()->route('admin.home')->with('success', 'Anda berhasil login sebagai ' . $level);
    //     } else {
    //         return back()->with('error', 'Email atau password salah');
    //     }

    //     // if (auth()->guard('is_admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //     //     // $admin = auth()->guard('is_admin')->user();
    //     //     // \Session::put('success', 'Anda berhasil login!');
    //     //     return redirect()->route('admin.home')->with('success', 'Anda berhasil Login');
    //     // } else {
    //     //     return back()->with('error', 'email atau password salah');
    //     // }
    // }

    public function logoutAdmin(Request $request)
    {

        auth()->guard('is_admin')->logout();
        // \Session::flush();
        // Saat admin logout
        Session::forget('admin_name');
        // \Session::put('success', 'Anda berhasil keluar dari halaman Admin');
        return redirect(url('admin/login'))->with('success', 'Anda berhasil keluar dari halaman Admin');
    }
    public function index()
    {
        //
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
