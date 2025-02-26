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
            $table -> string('product_id');
            $table -> string('product_name');
            $table -> string('category');
            $table -> string('price');
            $table -> string('product_image') -> nullable();
            $table -> string('product_image2') -> nullable();
            $table -> string('product_image3') -> nullable();
            $table -> text('description');
            $table -> string('quantity');
            $table->timestamps();
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
