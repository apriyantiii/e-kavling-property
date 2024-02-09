<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestChats = Chat::select('chats.id', 'chats.user_id', 'chats.product_id', 'chats.admin_id', 'chats.message', 'chats.status', 'chats.created_at')
            ->join(DB::raw('(SELECT user_id, MAX(created_at) as max_created_at FROM chats GROUP BY user_id) as latest_chats'), function ($join) {
                $join->on('chats.user_id', '=', 'latest_chats.user_id')
                    ->on('chats.created_at', '=', 'latest_chats.max_created_at');
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();

        return view('admin.live-chat.index', compact('latestChats'));
    }

    public function show($userId)
    {
        // $userChats = Chat::where('user_id', $userId)
        //     ->whereNull('admin_id') // Hanya chat dari user (admin_id null)
        //     ->orderBy('created_at', 'asc')
        //     ->get();
        $userChats = Chat::where('user_id', $userId)
            ->where(function ($query) use ($userId) {
                $query->whereRaw('(admin_id IS NULL OR admin_id <> ?)', [$userId]);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        $adminChats = Chat::whereNotNull('admin_id') // Hanya chat dari admin (admin_id tidak null)
            ->whereNotNull('user_id') // Hanya chat yang tidak ditujukan kepada pengguna (user_id null)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.live-chat.show', compact('userChats', 'userId', 'adminChats'));
    }

    public function store(Request $request, $userId)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'product_id' => 'nullable|exists:products,id',
                'message' => 'required|string',
            ]);

            // Mengambil ID admin yang sedang login
            $adminId = Auth::guard('is_admin')->user()->id;

            // Mendapatkan product_id dari request
            $productId = $request->input('product_id');

            // Create a new Chat instance and fill it with the validated data
            Chat::create([
                'user_id' => $userId, // Menggunakan $userId dari parameter
                'admin_id' => $adminId,
                'product_id' => $productId,
                'message' => $request->input('message'),
                'status' => 'accept',
            ]);

            // Menggunakan redirect biasa
            $redirect = redirect()->route('admin.chat.show')->with('success', 'Pesan Terkirim!');
            // dd(session('success'), $redirect);

            return $redirect;
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
        }
    }



    // public function store(Request $request)
    // {
    //     try {
    //         // Validate the incoming request data
    //         $request->validate([
    //             'product_id' => 'nullable|exists:products,id',
    //             'message' => 'required|string',
    //         ]);

    //         $userId = Chat::where('user_id', $userId)

    //         // Mengambil ID pengguna yang sedang login
    //         $adminId = Auth::guard('is_admin')->user()->id;
    //         $productId = $request->input('product_id');

    //         // Create a new Chat instance and fill it with the validated data
    //         Chat::create([
    //             'user_id' => $userId,
    //             'admin_id' => $adminId,
    //             'message' => $request->input('message'),
    //             'status' => 'accept',
    //         ]);

    //         // Menggunakan redirect biasa
    //         $redirect = redirect()->route('admin.live-chat.show')->with('success', 'Pesan Terkirim!');
    //         // dd(session('success'), $redirect);

    //         return $redirect;
    //     } catch (\Exception $e) {
    //         dd($e->getMessage()); // Tampilkan pesan exception untuk debugging
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    //
    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */

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
