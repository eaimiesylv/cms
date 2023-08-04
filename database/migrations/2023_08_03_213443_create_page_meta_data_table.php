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
        Schema::create('page_meta_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->unsignedBigInteger('meta_data_id')->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->timestamps();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('meta_data_id')->references('id')->on('meta_data')->onDelete('cascade');
            $table->unique(['page_id', 'meta_data_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_meta_data');
    }
};
