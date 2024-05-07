<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Product;
use App\Models\PurchaseValidation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payments>
 */
class PaymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'purchase_validation_id' => function () {
                return PurchaseValidation::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
            'admin_id' => function () {
                return Admin::factory()->create(['level' => 'director'])->id;
            },
            'name' => $this->faker->name,
            'payment_date' => $this->faker->dateTime(),
            'type' => $this->faker->randomElement(['cash', 'inhouse', 'kpr']), // Ubah ini sesuai dengan kebutuhan
            'home_bank' => $this->faker->word,
            'destination_bank' => $this->faker->word,
            'rekening_name' => $this->faker->name,
            'nominal' => $this->faker->numberBetween(100000, 1000000),
            'transfer' => $this->faker->word . '.pdf',
            'payment_description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
