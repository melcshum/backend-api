<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->string('scenario_name')->unique();
            $table->string('card_prefab_name')->unique();
            $table->double('difficulty_rate')->default(0);
            $table->float('uncertainty')->default(0);
            $table->float('k_factor')->default(0);
            $table->unsignedInteger('time_limit')->default(0);
            $table->float('boss_can_use')->default(0)->comment('1 can use, 0 cannot use');
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
        Schema::dropIfExists('scenarios');
    }
}
