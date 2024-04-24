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
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('sku')->unique()->nullable(); //Unique identifier
            $table->string('type')->default('simple'); //simple, grouped, external and variable
            $table->string('status')->default('publish'); // draft, pending, private and publish.
            $table->boolean('featured')->default(false);
            $table->string('catalog_visibility')->default('visible'); //visible, catalog, search and hidden. Default is visible.
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();
            $table->decimal('price',total: 8, places: 2);
            $table->decimal('regular_price',total: 8, places: 2);
            $table->decimal('sale_price',total: 8, places: 2);
            $table->boolean('on_sale')->default(true);
            $table->integer('stock_quantity')->default(0);
            $table->string('stock_status')->default('instock');//instock, outofstock
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('image')->nullable();
            $table->text('meta_data')->nullable();
            $table->boolean('variation')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_models');
    }
};
