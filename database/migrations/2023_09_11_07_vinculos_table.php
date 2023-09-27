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
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discente_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('orientador_id');
            $table->foreign('discente_id')->references('id')->on('discentes');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('orientador_id')->references('id')->on('orientadores');
            $table->boolean('statusVinculo');
            $table->string('contrato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists9('vinculos');
    }
};

//     'discente_id',
//     'empresa_id',
//     'orientador_id',
//     'statusVinculo',
//     'contrato' => 'blob',
