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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('invoice_number', 100)->index();
            $table->string('seriaal');
            $table->string('serial_series');
            $table->integer('serial_number');
            $table->unique(['serial_series', 'serial_number']);
            $table->decimal('payable_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
