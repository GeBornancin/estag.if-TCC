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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->string('tituloVaga');
            $table->text('descricaoVaga');
            $table->integer('salarioVaga')->nullable();
            $table->string('localVaga');
            $table->string('periodoVaga');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('area_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists9('vagas');
    }
};
// 'tituloVaga',
// 'descricaoVaga',
// 'salarioVaga',
// 'localVaga',
// 'periodoVaga',
// 'empresa_id',
// 'area_id',