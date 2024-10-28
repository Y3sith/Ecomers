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
        Schema::create('requested_detail', function (Blueprint $table) {

            $table->id();
            $table->integer('amount');
            $table->float('price');
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('order');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_detail');
    }
};
