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
        Schema::create('cosplays', function (Blueprint $table) {
            $table->id();
            $table->string('autor_name')->nullable();
            $table->string('class_name');
            $table->string('pinture_name')->nullablle();
            $table->text('description')->nullablle();
            $table->string('cosplay_path')->unique();
            $table->string('pinture_path')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cosplays');
    }
};
