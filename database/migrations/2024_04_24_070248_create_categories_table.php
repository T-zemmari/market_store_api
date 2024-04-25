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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('display')->default('default');
            $table->string('image')->nullable();
            $table->string('status')->default('active');//active no active or deleted
            $table->string('discontinued')->default(false);//true o false
            $table->string('valid')->default(true);//true o false
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
