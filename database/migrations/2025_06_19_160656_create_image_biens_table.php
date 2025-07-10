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
        Schema::create('image_biens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propertie_id')->constrained()->onDelete('cascade');
            $table->string('image_path');       
            $table->boolean('is_main')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_biens');
    }
};
