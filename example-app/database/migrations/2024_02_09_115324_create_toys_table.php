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
        Schema::create('toys', function (Blueprint $table) {
            $table->id();
            $table->string('color');
            $table->integer('cat_id');
            // $table->unsignedBigInteger('cat_id')->nullable();
            $table->foreign('cat_id')->on('cats')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toys');
    }
};
