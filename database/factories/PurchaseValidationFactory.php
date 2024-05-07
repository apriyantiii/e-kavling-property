<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseValidation>
 */
class PurchaseValidationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'product_id' => function () {
                return \App\Models\Product::factory()->create()->id;
            },
            'admin_id' => function () {
                return \App\Models\Admin::factory()->create()->id;
            },
            'name' => $this->faker->name(),
            'nik' => $this->faker->numerify('###############'),
            'job' => $this->faker->jobTitle(),
            'age' => $this->faker->numberBetween(18, 60),
            'telpon' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'kk_file' => $this->faker->imageUrl(200, 200, 'kk'),
            'ktp_file' => $this->faker->imageUrl(200, 200, 'ktp'),
        ];
    }
}
