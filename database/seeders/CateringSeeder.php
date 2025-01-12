<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("caterings")->insert([
            [
                'id' => Str::uuid(),
                'nome' => 'Catering Delícias da Terra',
                'morada_sede' => 'Avenida das Flores, 123, Porto',
                'telefone' => '912345678',
                'descricao' => 'Serviço de catering especializado em pratos regionais e alimentos frescos.',
                'preco_por_pessoa' => 25.00,
                'num_max_pessoas' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'nome' => 'Sabor Gourmet Catering',
                'morada_sede' => 'Rua do Gourmet, 456, Lisboa',
                'telefone' => '923456789',
                'descricao' => 'Catering de alta gastronomia, com menus exclusivos para eventos corporativos.',
                'preco_por_pessoa' => 50.00,
                'num_max_pessoas' => 200,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'nome' => 'Catering Maré Alta',
                'morada_sede' => 'Rua da Praia, 789, Cascais',
                'telefone' => '934567890',
                'descricao' => 'Catering especializado em frutos do mar e cozinha mediterrânea.',
                'preco_por_pessoa' => 40.00,
                'num_max_pessoas' => 150,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'nome' => 'Catering Festas e Sabores',
                'morada_sede' => 'Rua das Celebrações, 101, Coimbra',
                'telefone' => '945678901',
                'descricao' => 'Oferecemos catering para festas de aniversário, casamentos e eventos.',
                'preco_por_pessoa' => 30.00,
                'num_max_pessoas' => 120,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'nome' => 'Catering Chef’s Table',
                'morada_sede' => 'Avenida do Chef, 202, Faro',
                'telefone' => '956789012',
                'descricao' => 'Catering gourmet com pratos exclusivos, perfeitos para eventos sofisticados.',
                'preco_por_pessoa' => 70.00,
                'num_max_pessoas' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
