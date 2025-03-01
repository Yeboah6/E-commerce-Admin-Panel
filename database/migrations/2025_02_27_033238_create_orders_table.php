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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table -> string('order_id');

            $table -> bigInteger('customer_id')->unsigned()->index()->nullable();
            $table -> foreign('customer_id') -> references('id') -> on('customers') ->onDelete('cascade');

           $table -> bigInteger('product_id')->unsigned()->index()->nullable();
            $table -> foreign('product_id') -> references('id') -> on('products') ->onDelete('cascade');

            // $table -> string('quantity');
            $table -> string('address_id'); // Link address_id to Delivery Address
            $table -> string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
