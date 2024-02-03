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
            $table->string('name');
            $table->bigInteger('nik');
            $table->string('job');
            $table->integer('age');
            $table->string('telpon');
            $table->text('address');
            $table->enum('status', ['approved', 'pending', 'rejected'])->default('pending');
            // Menambahkan kolom untuk Kartu Keluarga (KK) dan Kartu Tanda Penduduk (KTP)
            $table->string('kk_file')->nullable(); // Kolom untuk KK, bisa berupa path file atau nama file
            $table->string('ktp_file')->nullable(); // Kolom untuk KTP, bisa berupa path file atau nama file

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_validations');
    }
};
