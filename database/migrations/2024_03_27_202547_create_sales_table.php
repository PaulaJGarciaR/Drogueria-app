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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('total_payment',8,2);
            $table->date('date_of_sale')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
            ->references('id')->on('customers');
            $table->string('ruta')->nullable();
            $table->string('registeredby');
            //  $table->string('status');
            $table->decimal('total',10,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
