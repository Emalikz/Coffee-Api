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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger("created_by")->change();
            $table->unsignedBigInteger("deleted_by")->nullable(true)->default(null)->change();
            $table->unsignedBigInteger("modified_by")->nullable(true)->default(null);
            $table->foreign("created_by")->references("id")->on("users");
            $table->foreign("deleted_by")->references("id")->on("users");
            $table->foreign("modified_by")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(["created_by","deleted_by", "modified_by"]);
            $table->dropColumn("modified_by");
        });
    }
};
