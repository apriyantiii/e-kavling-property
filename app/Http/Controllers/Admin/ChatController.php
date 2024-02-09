<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
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
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.live-chat.show', compact('userChats'));
    }

    // public function show($userId)
    // {
    //     // Ambil semua percakapan untuk pengguna tertentu
    //     $chats = Chat::all();

    //     // dd($chats);

    //     return view('admin.live-chat.show', compact('chats'));
    // }

    public function showChat($userId)
    {
        // Ambil semua percakapan untuk pengguna tertentu
        $chats = Chat::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();



        return view('admin.live-chat.show-chat', compact('chats'));
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
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    // public function showChat(Chat $chat)
    // {
    //     return view('admin.live-chat.show', compact('chat'));
    // }

    // public function showChat($userId)
    // {
    //     $chat = Chat::where('user_id', $userId)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return view('admin.live-chat.show', compact('chat'));
    // }

    // public function showChat($userId)
    // {
    //     // Ambil semua pesan dari pengguna dengan user_id yang diberikan
    //     $roomChats = Chat::where('user_id', $userId)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     dd($roomChats);

    //     return view('admin.live-chat.show', compact('roomChats'));
    // }


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
