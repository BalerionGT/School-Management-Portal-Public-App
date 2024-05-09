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
        Schema::create('séances', function (Blueprint $table) {
            $table->id();
            $table->date("Date");
            $table->time("heure_début");
            $table->time("heure_fin");
            $table->integer("salle");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('séances');
    }
};
