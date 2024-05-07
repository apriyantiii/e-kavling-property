<?php

namespace Tests\Unit;

use Database\Factories\AdminFactory;
use Tests\TestCase;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Admin;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PropertyTest extends TestCase
{
    use  WithFaker;
    // RefreshDatabase

    /**
     * Test index method.
     *
     * @return void
     */
    // public function test_index()
    // {
    //     $this->withoutExceptionHandling();

    //     // Retrieve the existing admin
    //     $admin = Admin::where('email', 'administrator@gmail.com')->first();

    //     // Pastikan admin tidak kosong sebelum melakukan login
    //     if ($admin) {
    //         Auth::login($admin, 'is_admin');

    //         // Retrieve some existing products from the database
    //         $products = Product::inRandomOrder()->limit(5)->get();

    //         // Call the index method
    //         $response = $this->actingAs($admin, 'is_admin')->get(route('product.index'));

    //         // Assert the response status is 200
    //         $response->assertStatus(200);

    //         // Assert the view has the necessary data
    //         $response->assertViewHas('products', $products);
    //     } else {
    //         $this->fail('Admin tidak ditemukan.');
    //     }
    // }

    public function test_index()
    {
        $this->withoutExceptionHandling();

        // Check if an admin with email 'administrator@gmail.com' exists
        $admin = Admin::where('email', 'administrator@gmail.com')->first();

        // Call the index method
        $response = $this->actingAs($admin, 'is_admin')->get(route('product.index'));

        // Assert the response status is 200
        $response->assertStatus(200);

        // Assert the view has the necessary data
        $response->assertViewHas('products');
    }

    public function test_create()
    {
        $this->withoutExceptionHandling();

        // Retrieve the existing admin
        $admin = Admin::where('email', 'administrator@gmail.com')->first();

        // Pastikan admin tidak kosong
        if (!$admin) {
            $this->fail('Admin tidak ditemukan.');
        }

        // Lakukan login sebagai admin
        Auth::login($admin, 'is_admin');

        // Panggil route untuk halaman create product
        $response = $this->actingAs($admin, 'is_admin')->get(route('product.create'));

        // Assert bahwa halaman create berhasil dimuat
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $this->withoutExceptionHandling();

        // Create an admin
        $admin = Admin::where('email', 'administrator@gmail.com')->first();

        Auth::login($admin, 'is_admin');

        // Simulate a file upload
        Storage::disk('public');
        $file = UploadedFile::fake()->image('photo.jpg');

        // Panggil route untuk store product
        $response = $this->actingAs($admin, 'is_admin')->post(route('product.store'), [
            'product_category_id' => 1,
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'feature' => $this->faker->sentence,
            'status' => 'active',
            'location' => $this->faker->address,
            'size' => strval($this->faker->randomNumber(2)), // Convert to string
            'price' => strval($this->faker->randomNumber(4)), // Convert to string
            'photo' => $file,
            'video_url' => UploadedFile::fake()->create('video.mp4', 5000), // Create a video file with 5000 KB size
            'latitude' => strval($this->faker->latitude), // Convert to string
            'longitude' => strval($this->faker->longitude), // Convert to string
        ]);

        $response->assertRedirect(route('product.index'))->assertSessionHas('success', 'Data produk baru berhasil ditambahkan!');

        // Assert bahwa file photo disimpan di storage
        Storage::disk('public')->assertExists('products/' . $file->hashName());
    }

    public function test_edit()
    {
        $this->withoutExceptionHandling();

        // Create an admin
        $admin = Admin::where('email', 'administrator@gmail.com')->first();

        // Pastikan admin tidak kosong
        if (!$admin) {
            $this->fail('Admin tidak ditemukan.');
        }

        // Lakukan login sebagai admin
        Auth::login($admin, 'is_admin');

        // Buat produk baru untuk diubah
        $product = Product::factory()->create();

        // Panggil route untuk halaman edit product
        $response = $this->actingAs($admin, 'is_admin')->get(route('product.edit', $product));

        // Assert bahwa halaman edit berhasil dimuat
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $this->withoutExceptionHandling();

        // Create an admin
        $admin = Admin::where('email', 'administrator@gmail.com')->first();

        Auth::login($admin, 'is_admin');

        // Buat produk baru untuk diubah
        $product = Product::factory()->create();

        // Simulate a file upload
        Storage::disk('public');
        $file = UploadedFile::fake()->image('photo.jpg');

        // Panggil route untuk update product
        $response = $this->actingAs($admin, 'is_admin')->put(route('product.update', $product), [
            'product_category_id' => 1,
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'feature' => $this->faker->sentence,
            'status' => 'active',
            'location' => $this->faker->address,
            'size' => strval($this->faker->randomNumber(2)), // Convert to string
            'price' => strval($this->faker->randomNumber(4)), // Convert to string
            'photo' => $file,
            'video_url' => UploadedFile::fake()->create('video.mp4', 5000), // Create a video file with 5000 KB size
            'latitude' => strval($this->faker->latitude), // Convert to string
            'longitude' => strval($this->faker->longitude), // Convert to string
        ]);

        // Assert bahwa produk berhasil diupdate dan redirect ke halaman index
        $response->assertRedirect(route('product.index'))->assertSessionHas('success', 'Data produk berhasil diperbarui!');

        // Assert bahwa file photo disimpan di storage
        Storage::disk('public')->assertExists('products/' . $file->hashName());
    }

    public function test_destroy()
    {
        $this->withoutExceptionHandling();

        // Create an admin
        $admin = Admin::where('email', 'administrator@gmail.com')->first();

        // Pastikan admin tidak kosong
        if (!$admin) {
            $this->fail('Admin tidak ditemukan.');
        }

        // Lakukan login sebagai admin
        Auth::login($admin, 'is_admin');

        // Buat produk baru untuk dihapus
        $product = Product::factory()->create();

        // Panggil route untuk menghapus product
        $response = $this->actingAs($admin, 'is_admin')->delete(route('product.destroy', $product));

        // Assert bahwa produk berhasil dihapus dan redirect ke halaman index
        $response->assertRedirect(route('product.index'))->assertSessionHas('success', 'Data produk berhasil dihapus!');

        // Pastikan produk sudah terhapus dari database
        $this->assertSoftDeleted('products', ['id' => $product->id]);
    }
}
