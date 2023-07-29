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
        Schema::create('composicao_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('composicao_id')->index();
            $table->string('item_type')->index();
            $table->string('item_id')->index();
            $table->string('item_id_column')->nullable()->index();
            $table->boolean('is_a_composicao')->nullable()->default(false)->index();
            $table->timestamps();

            $table->foreign('composicao_id')->references('id')
                ->on('composicoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composicao_items');
    }
};
