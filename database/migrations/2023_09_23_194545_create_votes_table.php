<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('class_name');
            $table->string('item_type');
            $table->integer('item_id');
            $table->unique(['user_id', 'class_name', 'item_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}

