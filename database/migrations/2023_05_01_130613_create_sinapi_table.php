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
        Schema::create('sinapi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descricao', 300);
            $table->string('codigo')->unique()->index();
            $table->string('custo')->index();
            $table->integer('unidade_medida')->index(); // UnidadeMedidaEnum::enums
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinapi');
    }
};
