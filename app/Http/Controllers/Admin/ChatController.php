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

        $allChats = $userChats->merge($adminChats)->sortBy('created_at');

        // Update status chat menjadi "dibaca"
        foreach ($allChats as $chat) {
            if ($chat->user_id == $userId && $chat->status != 'read') {
                $chat->status = 'read';
                $chat->save();
            }
        }

        // Pastikan $userId tersedia sebelum mengirimkan ke tampilan
        $userId = $userId ?? null;

        return view('admin.live-chat.show', ['userId' => $userId, 'allChats' => $allChats]);
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
            $redirect = redirect()->route('admin.chat.show', ['userID' => $userId])->with('success', 'Pesan Terkirim!');

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
}
