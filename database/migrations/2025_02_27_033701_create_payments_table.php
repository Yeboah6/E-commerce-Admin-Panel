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
            $table -> string('payment_id');

            $table -> bigInteger('customer_id')->unsigned()->index()->nullable();
            $table -> foreign('customer_id') -> references('id') -> on('customers') ->onDelete('cascade');

            $table -> bigInteger('order_id')->unsigned()->index()->nullable();
            $table -> foreign('order_id') -> references('id') -> on('orders') ->onDelete('cascade');

            $table -> string('payment_method');
            $table -> string('amount');
            $table -> string('status');
            $table->timestamps();
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
