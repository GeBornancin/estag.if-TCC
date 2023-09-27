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
            $table->timestamp('idadeDiscente');
            $table->string('periodoDiscente');
            $table->boolean('statusDiscente');
            $table->text('descricaoDiscente');
            $table->string('fotoDiscente')->nullable();
            $table->string('telefoneDiscente')->unique();
            $table->unsignedBigInteger('area_id');
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
        Schema::dropIfExists('discentes');
    }
};
