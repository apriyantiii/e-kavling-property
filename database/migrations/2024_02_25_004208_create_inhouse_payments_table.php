<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inhouse_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_validation_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->string('name');
            $table->string('tenor'); //12 bulan, 6 bulan dst
            $table->string('payment_type'); //pembayaran pertama kedua dst
            $table->date('payment_date');
            $table->string('home_bank');
            $table->string('destination_bank');
            $table->string('rekening_name');
            $table->integer('nominal');
            $table->integer('remaining_amount');
            $table->string('transfer');
            $table->text('payment_description')->nullable();
            $table->enum('status', ['pending', 'rejected', 'approved'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('purchase_validation_id')->references('id')->on('purchase_validations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inhouse_payments');
    }
};
