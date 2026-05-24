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
        // php artisan make:migration create_product_sliders_table
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('img1', 255);
            $table->string('img2', 255);
            $table->string('img3', 255);
            $table->string('img4', 255);

            $table->longText('long_desp');

            $table->string('color', 50);
            $table->string('size', 50);

            $table->unsignedBigInteger('product_id');

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
