<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDifficultySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difficulty_settings', function (Blueprint $table) {
            $table->id();

            $table->double('rating')->default(0);
            $table->float('uncertainty')->default(0);
            $table->float('k_factor')->default(0);
            $table->integer('play_count')->default(0);
            //$table->unsignedInteger('time_limit')->default(0);
            $table->string('type');

            $table->unsignedBigInteger('interaction_object_id');
            $table->foreign('interaction_object_id')->references('id')->on('interaction_objects')
                ->onDelete('cascade');

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
        Schema::dropIfExists('difficulty_settings');
    }
}
