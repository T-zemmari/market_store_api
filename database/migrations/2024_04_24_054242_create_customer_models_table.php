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
        Schema::create('customer_models', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('customer_type');
            $table->string('email');
            $table->string('password');
            $table->string('adress');
            $table->string('postal_code');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone');
            $table->boolean('is_paying_customer')->default(true);
            $table->boolean('avatar_url')->nullable();
            $table->text('meta_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_models');
    }
};
