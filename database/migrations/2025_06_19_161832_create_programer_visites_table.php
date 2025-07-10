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
        Schema::create('programer_visites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('visitor_name');
            $table->string('visitor_email');
            $table->string('visitor_phone');
            $table->datetime('visit_date');
            $table->text('message')->nullable();
            $table->enum('status', ['en_attente', 'confirmer', 'completer', 'rejetter'])->default('en_attente');
            $table->foreignId('agent_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('notes')->nullable(); // Notes de l'agent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programer_visites');
    }
};
