<?php

use App\Models\Fillière;
use App\Models\Module;
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
        Schema::create('fillières_modules', function (Blueprint $table) {
            $table->primary(['module_id' ,'fillière_id']);
            $table->foreignIdFor(Module::class);
            $table->foreignIdFor(Fillière::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fillières_modules');
    }
};
