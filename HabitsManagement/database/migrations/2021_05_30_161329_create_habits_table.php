<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habits', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();

            $table->string('title');
            $table->integer('priority');
            $table->string('description');
            $table->string('why');
            $table->string('how');
            $table->string('when');
            $table->string('how_much');
            $table->string('where');
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habits');
    }
}
