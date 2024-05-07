<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\PurchaseValidation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdministrationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use WithFaker;

    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function user_can_view_administration_form()
    {
        $user = User::factory()->create(); // Buat pengguna baru
        $product = Product::factory()->create();

        // Otentikasi pengguna
        Auth::login($user);

        $response = $this->get(route('checkout.purchase', $product->id));

        $response->assertStatus(200)
            ->assertViewIs('user.checkout.purchase-validation.index-checkout')
            ->assertViewHas('product', $product);
    }

    /** @test */
    public function user_can_submit_administration()
    {
        Storage::fake('public');

        $user = User::factory()->create(); // Buat pengguna baru
        $product = Product::factory()->create();
        $file = UploadedFile::fake()->create('document.pdf', 100);

        // Otentikasi pengguna
        Auth::login($user);

        $data = [
            'name' => $this->faker->name,
            'nik' => $this->faker->randomNumber(8),
            'job' => $this->faker->jobTitle,
            'age' => $this->faker->numberBetween(18, 65),
            'telpon' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'product_id' => $product->id,
            'kk_file' => $file,
            'ktp_file' => $file,
            'g-recaptcha-response' => 'test-captcha'
        ];

        $response = $this->post(route('purchase.validation.store'), $data);

        $response->assertStatus(302)
            ->assertSessionHas('purchase_status', 'waiting_confirmation');

        // Periksa apakah respons memiliki properti kk_file dan ktp_file
        $response->assertSessionHas('success')
            ->assertRedirect();

        // Mendapatkan data pembelian validasi yang baru dibuat
        $purchaseValidation = PurchaseValidation::where('user_id', $user->id)
            ->latest()
            ->first();

        // Pastikan data pembelian validasi ditemukan
        $this->assertNotNull($purchaseValidation);

        // Periksa apakah file KK dan KTP disimpan dengan benar
        Storage::assertExists('public/uploads/' . $purchaseValidation->kk_file);
        Storage::assertExists('public/uploads/' . $purchaseValidation->ktp_file);
    }



    /** @test */
    public function user_can_view_waiting_validation_page()
    {
        $purchaseValidation = PurchaseValidation::factory()->create();

        $response = $this->get(route('waiting-validate', $purchaseValidation->id));

        $response->assertStatus(200)
            ->assertViewIs('user.checkout.purchase-validation.waiting-validate')
            ->assertViewHas('waitingValidate', $purchaseValidation);
    }

    /** @test */
    public function user_can_view_rejected_administration_page()
    {
        $response = $this->get(route('rejected-validate'));

        $response->assertStatus(200)
            ->assertViewIs('user.checkout.purchase-validation.waiting-rejected');
    }
}
