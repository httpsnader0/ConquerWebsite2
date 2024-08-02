<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('slug');
            $table->enum('type', ['Server Events', 'Boss Monsters', 'Server Quests'])->default('Server Events');
            $table->json('name');
            $table->json('explain');
            $table->json('time');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
