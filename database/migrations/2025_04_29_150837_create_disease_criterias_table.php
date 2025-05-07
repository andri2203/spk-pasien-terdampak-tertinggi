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
        Schema::create('disease_criterias', function (Blueprint $table) {
            $table->id();
            $table->string('criteria');
            $table->integer('weight');
            $table->foreignId('disease_id')->references('id')->on('diseases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disease_criterias');
    }
};
