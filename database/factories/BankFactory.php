<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Menentukan model yang diwakili oleh factory ini.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Mendefinisikan atribut default dari model.
     *
     * @return array
     */
    public function definition()
    {
        // Ambil random admin id yang tersedia
        $adminId = Admin::pluck('id')->random();

        return [
            'name' => $this->faker->company,
            'rekening' => $this->faker->bankAccountNumber,
            'bank' => $this->faker->word,
            'admin_id' => $adminId,
        ];
    }
}
