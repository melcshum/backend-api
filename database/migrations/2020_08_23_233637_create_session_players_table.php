<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_players', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();

            $table->double('difficulty_rate')->default(0);
            $table->float('uncertainty')->default(0);
            $table->float('k_factor')->default(0);
            $table->unsignedInteger('time_limit')->default(0);
            $table->dateTime('player_last_time');

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
        Schema::dropIfExists('session_players');
    }
}
