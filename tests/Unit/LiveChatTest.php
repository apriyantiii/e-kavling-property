<?php

namespace Tests\Unit;

use App\Http\Controllers\Admin\ChatController;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LiveChatTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function index_returns_view_with_latest_chats()
    {
        // Buat admin dengan alamat email unik
        $admin = Admin::factory()->create(['email' => 'unique_admin_' . uniqid() . '@example.com']); // Menggunakan alamat email yang unik

        // Pastikan admin telah dibuat
        $this->assertNotNull($admin);

        // Lakukan login sebagai admin
        $this->actingAs($admin, 'is_admin');

        // Lakukan request ke route index chat
        $response = $this->get(route('admin.chat.index'));

        // Pastikan response adalah 200 OK
        $response->assertStatus(200)
            ->assertViewIs('admin.live-chat.index')
            ->assertViewHas('latestChats');
    }


    /** @test */
    public function store_creates_new_chat_and_redirects_to_show()
    {
        // Membuat admin untuk di-authenticate
        $admin = Admin::factory()->create(['email' => 'unique_admin_' . uniqid() . '@example.com']); // Menggunakan alamat email yang unik

        // Authenticate admin
        $this->actingAs($admin, 'is_admin');

        // Membuat produk baru
        $product = Product::factory()->create();

        // Data yang akan di-submit dalam request
        $requestData = [
            'product_id' => $product->id, // Menggunakan ID produk yang baru dibuat
            'message' => 'Test message',
        ];

        // Melakukan request POST ke route 'admin.chat.store'
        $response = $this->post(route('admin.chat.store', ['userID' => 1]), $requestData);

        // Memastikan chat baru telah dibuat dalam database
        $this->assertDatabaseHas('chats', [
            'user_id' => 1,
            'admin_id' => $admin->id,
            'product_id' => $requestData['product_id'],
            'message' => $requestData['message'],
            'status' => 'accept', // Anda mungkin perlu menyesuaikan dengan logika Anda
        ]);

        // Memastikan pengguna diarahkan ke tampilan show chat setelah berhasil membuat chat baru
        $response->assertRedirect(route('admin.chat.show', ['userID' => 1]))
            ->assertSessionHas('success', 'Pesan Terkirim!');
    }

    /** @test */
    public function destroy_deletes_chat_and_redirects_back()
    {
        // Buat admin dengan alamat email unik
        $admin = Admin::factory()->create(['email' => 'unique_admin_' . uniqid() . '@example.com']);

        // Pastikan admin telah dibuat
        $this->assertNotNull($admin);

        // Lakukan login sebagai admin
        $this->actingAs($admin, 'is_admin');

        // Buat chat baru untuk dihapus
        $chat = Chat::factory()->create();

        // Lakukan request DELETE ke route destroy chat
        $response = $this->delete(route('admin.chat.destroy', ['chat' => $chat->id]));

        // Pastikan chat telah dihapus dari database
        $this->assertDatabaseMissing('chats', [
            'id' => $chat->id,
        ]);

        // Memastikan pengguna diarahkan kembali ke halaman sebelumnya
        $response->assertRedirect()
            ->assertSessionHas('success', 'Pesan berhasil dihapus!');
    }
}
