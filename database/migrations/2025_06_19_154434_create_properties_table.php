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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('transaction_type', ['vente', 'location']);
            $table->decimal('prix', 12, 2);
            $table->decimal('surface_habitable', 8, 2);
            $table->integer('nb_chambres')->default(0);
            $table->integer('nb_salles_bain')->default(0);
            $table->integer('nb_etages')->default(0);
            $table->text('description')->nullable();
            $table->string('address');
            $table->boolean('is_active')->default(true);
            $table->boolean('en_vedette')->default(false);
            $table->foreignId('type_properties_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Agent
            $table->enum('status', ['disponible', 'vendu', 'loue', 'reserve'])->default('disponible');
            $table->timestamps();
           
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
