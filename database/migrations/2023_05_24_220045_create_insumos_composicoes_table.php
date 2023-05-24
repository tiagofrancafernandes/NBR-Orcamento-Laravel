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
        Schema::create('insumos_composicoes', function (Blueprint $table) {
            $table->unsignedBigInteger('composicao_id')->index();
            $table->unsignedBigInteger('insumo_id')->index();
            $table->char('coeficiente')->nullable();

            $table->foreign('composicao_id')->references('id')
                ->on('composicoes')->onDelete('cascade'); //cascade|set null

            $table->foreign('insumo_id')->references('id')
                ->on('insumos')->onDelete('cascade'); //cascade|set null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos_composicoes');
    }
};
