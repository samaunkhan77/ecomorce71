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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign( 'category_id')->references('id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign( 'sub_category_id')->references('id')->on('sub_categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign( 'brand_id')->references('id')->on('brands')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign( 'user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedBigInteger('sale_category_id')->nullable();
            $table->foreign( 'sale_category_id')->references('id')->on('sale_categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->longText('long_description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_discount')->nullable();
            $table->string('product_selling_price')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->string('product_image_1')->nullable();
            $table->string('product_image_2')->nullable();
            $table->string('product_image_3')->nullable();
            $table->string('product_image_4')->nullable();
            $table->string('product_image_5')->nullable();
            $table->string('product_status')->default('Pending');
            $table->string('product_view_count')->default('0');
            $table->string('product_slug')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('product_availability')->default('InStock');
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
