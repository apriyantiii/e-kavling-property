<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function index()
    // {
    //     $user = auth()->user();
    //     dd($user->avatar); // Debugging: lihat path avatar
    //     return view('user.profile.index', compact('user'));
    // }

    // public function update(Request $request, User $user)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|email|unique:users,email,' . $user->id,
    //             'password' => 'nullable|string|min:6',
    //             'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
    //             'contact' => 'required|string|max:20',
    //             'address' => 'required|string|max:255',
    //         ]);

    //         $user->update([
    //             'name' => $request->input('name'),
    //             'email' => $request->input('email'),
    //             'contact' => $request->input('contact'),
    //             'address' => $request->input('address'),
    //             'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
    //             'avatar' => $request->hasFile('avatar') ? $request->file('avatar')->store('avatars', 'public') : $user->avatar,
    //         ]);


    //         return redirect()->route('profile.update', ['user' => $user->id])->with('success', 'Profil pengguna berhasil diperbarui!');
    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
    //     }
    // }

    public function index()
    {
        $user = auth()->user();
        return view('user.profile.index', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6',
                'avatar' => 'nullable',
                'contact' => 'required|string|max:20',
                'address' => 'required|string|max:255',
            ]);

            $avatarPath = $request->hasFile('avatar')
                ? $request->file('avatar')->store('avatars', 'public')
                : $user->avatar;

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'contact' => $request->input('contact'),
                'address' => $request->input('address'),
                'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
                'avatar' => $avatarPath,
            ]);

            return redirect()->route('profile.index')->with('success', 'Profil pengguna berhasil diperbarui!');
        } catch (\Exception $e) {
            // Tampilkan pesan exception untuk debugging
            dd($e->getMessage());
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
