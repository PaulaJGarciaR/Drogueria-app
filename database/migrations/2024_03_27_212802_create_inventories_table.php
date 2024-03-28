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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')->on('products');
            $table->string('product_category');
            $table->decimal('price_sale',8,2);
            $table->integer('quantity_in_stock');
            $table->date('expiration_date');
            $table->string('supplier');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
