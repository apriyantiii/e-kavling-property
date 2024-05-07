<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Create a fake admin
        $admin = Admin::factory()->create();

        // Generate fake image
        $photo = UploadedFile::fake()->image('product.jpg');
        $photo2 = UploadedFile::fake()->image('product2.jpg');

        // Save the photo to storage
        $photoPath = Storage::putFile('products', $photo);
        $photo2Path = Storage::putFile('products', $photo2);

        return [
            'admin_id' => $admin->id,
            'product_category_id' => ProductCategory::factory()->create()->id,
            'name' => $this->faker->word,
            'code' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'feature' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'location' => $this->faker->address,
            'size' => $this->faker->randomElement(['S', 'M', 'L']),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'photo' => $photoPath,
            'photo_2' => $photo2Path,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'video_url' => UploadedFile::fake()->create('video.mp4')->store('videos', 'public'),
        ];
    }
}
