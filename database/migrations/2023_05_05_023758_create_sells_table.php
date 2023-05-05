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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sold_by")->nullable(false);
            $table->unsignedBigInteger("product_id")->nullable(false);
            $table->unsignedInteger("amount")->nullable(false);
            $table->foreign("sold_by")->references("id")->on("users");
            $table->foreign("product_id")->references("id")->on("products");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
