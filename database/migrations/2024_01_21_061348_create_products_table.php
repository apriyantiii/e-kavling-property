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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('product_category_id');

            $table->string('name');
            $table->string('code');
            $table->text('description');
            $table->text('feature');
            $table->string('status');
            $table->string('location');
            $table->double('latitude', 10, 8)->nullable();
            $table->double('longitude', 11, 8)->nullable();
            $table->string('size');
            $table->integer('price');
            $table->string('photo');
            $table->string('video_url')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
