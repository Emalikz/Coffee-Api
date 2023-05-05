<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Create products table
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_name")->nullable(false);
            $table->string("reference")->nullable(false);
            $table->float("price")->nullable(false);
            $table->float("weight")->nullable(false);
            $table->integer("stock")->nullable(false);
            $table->bigInteger("created_by")->nullable(false);
            $table->bigInteger("deleted_by")->nullable(true);
            $table->softDeletes();
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
