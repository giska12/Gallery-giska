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
        Schema::create('image_gallery', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            // relation ke image id
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('image')->onDelete('cascade');
            // relation ke user id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('image_gallery');
    }
};
