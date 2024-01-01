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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
            $table->string('type');
            $table->string('module');
            $table->string('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};