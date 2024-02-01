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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_validation_id');
            $table->string('name');
            $table->date('payment_date');
            $table->enum('type', ['cash', 'inhouse', 'kpr']);
            $table->string('tenor')->nullable();
            $table->string('home_bank');
            $table->string('destination_bank');
            $table->string('rekening_name');
            $table->integer('nominal');
            $table->string('transfer');
            $table->text('payment_description')->nullable();
            $table->enum('status', ['pending', 'process', 'approved'])->default('pending');
            $table->timestamps();

            $table->foreign('purchase_validation_id')->references('id')->on('purchase_validations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
