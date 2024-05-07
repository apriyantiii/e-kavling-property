<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Database\Eloquent\SoftDeletes;


class WishlistTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user
        $this->user = User::factory()->create();

        // Authenticate the user
        $this->actingAs($this->user);
    }

    /** @test */
    public function user_can_view_wishlist()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create a wishlist item for the user
        Wishlist::factory()->create([
            'user_id' => $this->user->id,
            'product_id' => $product->id,
        ]);

        // Hit the wishlist index route
        $response = $this->get(route('wishlist.index'));

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the product is displayed on the wishlist page
        $response->assertSee($product->name);
    }

    /** @test */
    public function user_can_add_product_to_wishlist()
    {
        // Create a product
        $product = Product::factory()->create();

        // Hit the route to add a product to the wishlist
        $response = $this->post(route('wishlist.store'), [
            'product_id' => $product->id,
        ]);

        // Assert the wishlist item is created
        $this->assertDatabaseHas('wishlists', [
            'user_id' => $this->user->id,
            'product_id' => $product->id,
        ]);

        // Assert the user is redirected to the wishlist index route
        $response->assertRedirect(route('wishlist.index'));
    }

    /** @test */
    public function user_can_remove_product_from_wishlist()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create a wishlist item for the user
        $wishlist = Wishlist::factory()->create([
            'user_id' => $this->user->id,
            'product_id' => $product->id,
        ]);

        // Hit the route to remove the product from the wishlist
        $response = $this->delete(route('wishlist.destroy', $wishlist));

        // Assert the wishlist item is deleted from the database
        $this->assertDatabaseMissing('wishlists', [
            'id' => $wishlist->id,
            'user_id' => $this->user->id,
            'product_id' => $product->id,
        ]);

        // Assert the user is redirected to the wishlist index route
        $response->assertRedirect(route('wishlist.index'));
    }
}
