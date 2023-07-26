<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nbr_sinapi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nbr_codigo');
            $table->string('sinapi_codigo');

            $table->unique(['nbr_codigo', 'sinapi_codigo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nbr_sinapi');
    }
};
