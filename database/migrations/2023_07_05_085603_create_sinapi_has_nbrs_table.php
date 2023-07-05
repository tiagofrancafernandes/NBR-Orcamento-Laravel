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
        Schema::create('sinapi_has_nbrs', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sinapi')->index();
            $table->string('codigo_nbr')->index();
            $table->string('descricao')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinapi_has_nbrs');
    }
};
