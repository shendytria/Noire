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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // KODE KUPON
            $table->enum('type', ['fixed', 'percent']); // potongan tetap / persen
            $table->integer('value'); // nominal / persen
            $table->integer('usage_limit')->nullable(); // batas pemakaian
            $table->integer('used')->default(0);
            $table->date('expired_at')->nullable(); 
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
