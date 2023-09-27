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
        Schema::create ('candidaturas', function(Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('discente_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('vaga_id');
            $table->foreign('discente_id')->references('id')->on('discentes');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('vaga_id')->references('id')->on('vagas');
            $table->date('dataCandidatura');
            $table->string('curriculo');
            $table->softDeletes();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists ('candidaturas');
    }
};

// 'discente_id',
// 'vaga_id',
// 'empresa_id',
// 'dataCandidatura'
// 'curriculo' => 'blob',
