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
        Schema::create('caterings', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nome");
            $table->string("morada_sede");
            $table->string("telefone");
            $table->text("descricao");
            $table->decimal("preco_por_pessoa");
            $table->integer("num_max_pessoas");
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caterings');
    }
};
