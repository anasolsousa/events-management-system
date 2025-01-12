<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_managers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('morada');
            $table->string('nif');
            $table->string('iban');
            $table->decimal('salario', 10, 2); 
            $table->text('descricao');
            $table->uuid('manager_id')->unique();
            $table->timestamps();

            // Corrigido para usar o nome da tabela 'managers'
            $table->foreign('manager_id')->references('id')->on('managers');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_managers');
    }
};
