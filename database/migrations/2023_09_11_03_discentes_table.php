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
        Schema::create('discentes', function (Blueprint $table){

            $table->id();
            $table->string('nomeDiscente');
            $table->integer('idadeDiscente');
            $table->string('periodoDiscente');
            $table->boolean('statusDiscente');
            $table->text('descricaoDiscente');
            $table->string('fotoDiscente')->nullable();
            $table->string('telefoneDiscente')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discentes');
    }
};
