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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->enum('type_demande', ['vente', 'achat', 'location', 'estimation', 'autre']);
            $table->text('message');
            $table->foreignId('properties_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['en_attente', 'traitee', 'cloturee'])->default('en_attente');
            $table->timestamp('traitee_le')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
