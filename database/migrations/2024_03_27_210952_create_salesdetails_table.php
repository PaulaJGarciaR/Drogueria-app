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
        Schema::create('salesdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')->on('products');
            $table->integer('quantity',10,0);
            $table->decimal('price_sale',8,2);
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')
            ->references('id')->on('sales');
            $table->string('registeredby');
            $table->decimal('subtotal');
            $table->string('ruta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesdetails');
    }
};
