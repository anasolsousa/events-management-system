<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('managers')->insert([
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Alice Oliveira',
                'telefone' => '930113444',
                'email' => 'alice.oliveira@gmail.com',
                'profile_manager_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'João Silva',
                'telefone' => '912345678',
                'email' => 'joao.silva@gmail.com',
                'profile_manager_id' => null, 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Maria Pereira',
                'telefone' => '923456789',
                'email' => 'maria.pereira@gmail.com',
                'profile_manager_id' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
