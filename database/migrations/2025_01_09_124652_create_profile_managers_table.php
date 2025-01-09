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
        Schema::create('profile_managers', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string("nome");
            $table->string("morada");
            $table->string("nif");
            $table->string("iban");
            $table->string("salario");
            $table->string("descricao");

            $table->uuid("manager_id");
            $table->foreign("manager_id")->references("id")->on("managers");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_managers');
    }
};
