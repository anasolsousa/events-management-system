<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locals')->insert([
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Restaurante Sabores do Campo',
                'morada' => 'Rua das Flores, 123, Vila Verde, País',
                'telefone' => '112233445',
                'num_max_pessoas' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Quinta da Oliveira',
                'morada' => 'Estrada de Gaia, 456, Gaia, País',
                'telefone' => '223344556',
                'num_max_pessoas' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Café da Praça',
                'morada' => 'Praça Central, 10, Cidade, País',
                'telefone' => '334455667',
                'num_max_pessoas' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Quinta dos Vinhedos',
                'morada' => 'Avenida do Sol, 202, Serra, País',
                'telefone' => '445566778',
                'num_max_pessoas' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Restaurante Maré Alta',
                'morada' => 'Rua da Praia, 789, Beira Mar, País',
                'telefone' => '556677889',
                'num_max_pessoas' => 120,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
