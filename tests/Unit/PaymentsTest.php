namespace Tests\Unit;
<?php

use App\Models\Admin;
use App\Models\Bank;
use App\Models\Product;
use App\Models\Payments;
use App\Models\PurchaseValidation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PaymentsTest extends TestCase
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
    public function director_can_update_payment_status()
    {
        // Create a director user
        $director = Admin::factory()->create(['level' => 'director']);

        // Create a payment
        $payment = Payments::factory()->create();

        // Mock authentication
        Auth::shouldReceive('guard->user')->andReturn($director);

        // Make a PATCH request to update payment status
        $response = $this->patch(route('update-status', $payment->id), ['status' => 'approved']);

        // Assert the response
        $response->assertStatus(302)
            ->assertRedirect();

        // Assert the payment status is updated
        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'status' => 'approved',
            'admin_id' => $director->id,
        ]);
    }

    /** @test */
    public function admin_cannot_update_payment_status()
    {
        // Create an admin user
        $admin = Admin::factory()->create(['level' => 'admin']);

        // Create a payment with status 'pending'
        $payment = Payments::factory()->create(['status' => 'pending']);

        // Mock authentication for admin
        Auth::shouldReceive('guard->user')->andReturn($admin);

        // Make a PATCH request to update payment status
        $response = $this->patch(route('update-status', $payment->id), ['status' => 'approved']);

        // Assert the response
        $response->assertStatus(403);

        // Assert the payment status is not updated
        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'status' => 'pending', // Ensure that the status remains 'pending'
        ]);
    }

    /** @test */
    public function admin_can_update_payment_details()
    {
        // Create an admin user
        $admin = Admin::factory()->create(['level' => 'admin']);

        // Create a payment
        $payment = Payments::factory()->create();

        // Mock authentication
        Auth::shouldReceive('guard->user')->andReturn($admin);

        // Fake file
        Storage::fake('public');
        $file = UploadedFile::fake()->create('document.pdf', 100);

        // Make a PUT request to update payment details
        $response = $this->put(route('checkout.payment.update', $payment->id), [
            'name' => $this->faker->name,
            'payment_date' => now()->format('Y-m-d'),
            'type' => 'cash',
            'home_bank' => 'BCA',
            'destination_bank' => 'BCA',
            'rekening_name' => $this->faker->name,
            'nominal' => 1000000,
            'transfer' => $file,
            'payment_description' => $this->faker->sentence,
            'status' => 'approved',
        ]);

        // Assert the response
        $response->assertRedirect(route('checkout.payment.show', $payment->id))
            ->assertSessionHas('success', 'Pembayaran berhasil diperbarui!');

        // Reload payment data after update
        $payment = $payment->fresh();

        // Assert the payment details are updated
        $this->assertDatabaseHas('payments', [
            'id' => $payment->id,
            'name' => $payment->name,
            'payment_date' => $payment->payment_date,
            'type' => $payment->type,
            'home_bank' => $payment->home_bank,
            'destination_bank' => $payment->destination_bank,
            'rekening_name' => $payment->rekening_name,
            'nominal' => $payment->nominal,
            'payment_description' => $payment->payment_description,
            'status' => 'approved',
            'admin_id' => $admin->id,
        ]);

        // Assert the transfer file is uploaded
        Storage::assertExists('public/uploads/' . $payment->transfer);
    }
}
