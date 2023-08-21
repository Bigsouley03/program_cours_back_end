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
        Schema::create('cours_deroulers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('nombreHeure');
            $table->longText('objectifs');
            $table->foreignId('cours_enroller_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours_deroulers');
    }
};
