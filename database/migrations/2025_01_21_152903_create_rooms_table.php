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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('event_title')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
<<<<<<< HEAD:database/migrations/2025_01_21_152903_create_events_table.php
            $table->string('lieu')->nullable();
            $table->string('event_type')->nullable();
            $table->date('date')->nullable();
=======
            $table->string('wifi')->default('yes');
            $table->string('room_type')->nullable();


>>>>>>> parent of 2f48760 (Merge pull request #16 from MohAitMesskine/CreateEvents):database/migrations/2025_01_21_152903_create_rooms_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
