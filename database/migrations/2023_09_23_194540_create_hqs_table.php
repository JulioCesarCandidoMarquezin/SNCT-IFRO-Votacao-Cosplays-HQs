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
        Schema::create('hqs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('autor_name');
            $table->string('class_name');
            $table->text('description'); 
            $table->string('images_path'); // Local onde estão as imagens dessa hq
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hqs');
    }
};
