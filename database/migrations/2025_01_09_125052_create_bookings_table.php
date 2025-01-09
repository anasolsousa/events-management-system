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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->datetime("data_evento");
            $table->decimal("valor_total");
            $table->string("estado");
            $table->integer("num_convidados");
            $table->text("descricao");

            $table->uuid("client_id");
            $table->foreign("client_id")->references("id")->on("clients");

            $table->uuid("manager_id");
            $table->foreign("manager_id")->references("id")->on("managers");
            
            $table->uuid("local_id");
            $table->foreign("local_id")->references("id")->on("locals");

            $table->uuid("catering_id");
            $table->foreign("catering_id")->references("id")->on("caterings");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
