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
        Schema::create('client_catering', function (Blueprint $table) {
            
            $table->uuid('client_id');
            $table->uuid('catering_id');
            $table->timestamps();

            $table->primary(['client_id', 'catering_id']);
            
            $table->foreign('client_id')->references('id')->on('clients');
                
            $table->foreign('catering_id')->references('id')->on('caterings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_catering');
    }
};
