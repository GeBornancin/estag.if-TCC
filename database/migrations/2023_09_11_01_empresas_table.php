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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeEmpresa');
            $table->string('enderecoEmpresa');
            $table->string('telefoneEmpresa')->unique();
            $table->string('emailEmpresa')->unique();
            $table->text('descricaoEmpresa');
            $table->boolean('statusEmpresa');
            $table->string('logoEmpresa')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');   
    }
};

// 'nomeEmpresa',
// 'enderecoEmpresa',
// 'telefoneEmpresa',
// 'emailEmpresa',
// 'descricaoEmpresa',
// 'statusEmpresa',
