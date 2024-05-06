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
        Schema::create('purchase_validations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->string('name');
            $table->bigInteger('nik');
            $table->string('job');
            $table->integer('age');
            $table->string('telpon');
            $table->text('address');
            $table->enum('status', ['approved', 'pending', 'rejected'])->default('pending');
            $table->string('kk_file')->nullable();
            $table->string('ktp_file')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('purchase_validations');
    }
};
