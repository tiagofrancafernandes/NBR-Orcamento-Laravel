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
        Schema::create('composicoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('composicao_ref')->nullable();
            $table->string('codigo_sinapi')->index()->nullable();
            $table->longText('descricao_sinapi')->nullable();
            $table->string('codigo_nbr')->index()->nullable();
            $table->longText('descricao_nbr')->nullable();
            $table->char('unidade_medida')->nullable();
            $table->char('valor_consolidado')->nullable();

            $table->timestamps();

            $table->foreign('composicao_ref')->references('id')
                ->on('composicoes')->onDelete('set null'); //cascade|set null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composicoes');
    }
};
