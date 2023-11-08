<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscenteSeeder extends Seeder
{
    public function run()
    {
        // Recupere o ID do usuário criado no seeder UserSeeder
        $userId = DB::table('users')->where('email', 'exemplo@email.com')->value('id');

        // Criar um discente de exemplo associado ao usuário
        DB::table('discentes')->insert([
            'nomeDiscente' => 'Nome do Exemplo',
            'idadeDiscente' => 20, // Idade de exemplo
            'periodoDiscente' => 'Matutino', // Período de exemplo
            'statusDiscente' => true,
            'descricaoDiscente' => 'Descrição de exemplo',
            'telefoneDiscente' => '123456789', // Telefone de exemplo
            'user_id' => $userId,
            'curso_id' => 1, // ID do curso de exemplo
            'fotoDiscente' => null, // Insira o nome do arquivo da foto, se aplicável
        ]);
    }
}
