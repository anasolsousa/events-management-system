<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
          
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'João Silva',
                'telefone' => '912345678',
                'email' => 'joao.silva@gmail.com',
                'nif' => '123456789',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Maria Pereira',
                'telefone' => '923456789',
                'email' => 'maria.pereira@gmail.com',
                'nif' => '987654321',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Carlos Santos',
                'telefone' => '934567890',
                'email' => 'carlos.santos@gmail.com',
                'nif' => '192837465',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Ana Costa',
                'telefone' => '945678901',
                'email' => 'ana.costa@gmail.com',
                'nif' => '564738291',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => (string) Str::uuid(), 
                'nome' => 'Pedro Alves',
                'telefone' => '956789012',
                'email' => 'pedro.alves@gmail.com',
                'nif' => '112233445',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
