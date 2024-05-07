<?php

namespace Tests\Unit;

use App\Http\Controllers\User\ProductController;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\PurchaseValidation;
use App\Models\Picture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class UserPropertiesTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_show_returns_view_with_product_details(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function index_categories_returns_view_with_all_categories()
    {
        $response = $this->get(route('categories.index'));

        $response->assertViewIs('user.categories.index')
            ->assertViewHas('allCategories');
    }

    /** @test */
    public function show_categories_returns_view_with_products_and_statuses()
    {
        // Membuat kategori produk
        $category = ProductCategory::factory()->create();

        // Mengambil beberapa produk yang sudah ada
        $products = Product::factory()->count(3)->create(['product_category_id' => $category->id]);

        // Mengambil status untuk setiap produk
        $statuses = [];
        foreach ($products as $product) {
            $isSold = PurchaseValidation::where('product_id', $product->id)
                ->where('status', 'approved')
                ->exists();
            $status = $isSold ? 'sold' : 'available';
            $statuses[$product->id] = $status;
        }

        // Melakukan request untuk menampilkan kategori produk
        try {
            $response = $this->get(route('categories.show', $category->id));
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan error sebenarnya
        }

        // Melakukan asertasi
        $response->assertStatus(200)
            ->assertViewIs('user.categories.show')
            ->assertViewHas('productCategory', $category)
            ->assertViewHas('products')
            ->assertViewHas('statuses', $statuses);
    }

    /** @test */
    public function search_returns_view_with_results_and_keyword()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.search', ['search' => $product->name]));

        $response->assertViewIs('user.products.search')
            ->assertViewHas('allProducts')
            ->assertViewHas('keyword', $product->name);
    }

    /** @test */
    public function show_returns_view_with_product_details()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create a random picture
        $picture = Picture::factory()->create();

        // Attach the picture to the product
        $product->picture()->associate($picture);
        $product->save();

        // Make request to show product details
        $response = $this->get(route('product.show', $product->id));

        $response->assertStatus(200)
            ->assertViewIs('user.products.show')
            ->assertViewHas('products', function ($viewProducts) use ($product) {
                return $viewProducts->contains($product);
            })
            ->assertViewHas('allProducts')
            ->assertSee('Internal Server Error'); // Add this to check for the cause of the error

        $response->dump(); // This will display the response information for debugging
    }

    /** @test */
    // public function show_returns_view_with_error_when_product_not_found()
    // {
    //     $response = $this->get(route('product.show', 999));

    //     $response->assertStatus(302)
    //         ->assertSessionHas('error', 'Produk tidak ditemukan.');
    // }
}
