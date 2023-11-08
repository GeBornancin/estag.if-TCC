<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    static $emails = [
        'admin@gmail.com',
        'serc@gmail.com',
    ];

    static $types = [
        'admin',
        'serc',
    ];

    public function run()
    {   
       
        for($i = 0; $i < count (self::$emails); $i++){
            $user = User::create([
                'email' => self::$emails[$i],
                'password' => Hash::make('12345678'), // Você pode alterar a senha conforme necessário
                'tipoUsuario' => self::$types[$i],
            ]);
            $user->save();
        }
    }
}
