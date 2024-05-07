<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generate fake image
        $photo = UploadedFile::fake()->image('category.jpg');

        // Save the photo to storage
        $photoPath = Storage::putFile('categories', $photo);

        return [
            'name' => $this->faker->word, // Nama kategori produk
            'code' => $this->faker->unique()->word, // Kode kategori produk
            'photo' => $photoPath, // Path foto kategori produk
            'location' => $this->faker->address, // Lokasi kategori produk
        ];
    }
}
