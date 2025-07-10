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
    Schema::create('property_views', function (Blueprint $table) {
        $table->id();
        $table->foreignId('property_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        $table->string('ip_address')->nullable(); // utile pour les visiteurs non connectés
        $table->string('user_agent')->nullable(); // navigateur
        $table->timestamps();
    });    
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
