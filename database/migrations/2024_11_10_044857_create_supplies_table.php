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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('description', 150)->nullable();
            $table->foreignId('unit_id')->nullable()->constrained('units');
            $table->foreignId('generic_id')->nullable()->constrained('generics');
            $table->foreignId('brand_id')->nullable()->constrained('brands');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
