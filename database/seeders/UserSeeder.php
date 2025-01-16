<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insérer un utilisateur
        DB::table('users')->insert([
            'name' => 'Guerfali nour',
            'email' => 'guerfalinour@example.com',
            'password' => Hash::make('password123'), // Hash du mot de passe
        ]);

        // Tu peux ajouter d'autres utilisateurs ici si nécessaire
        DB::table('users')->insert([
            'name' => 'Ghofrane Saidani',
            'email' => 'ghofrane@example.com',
            'password' => Hash::make('password456'),
        ]);
    }
}