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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('address_id')->nullable()->references('id')->on('addresses')->onDelete('set null');
            $table->string('img_path')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
