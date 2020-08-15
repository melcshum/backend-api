<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interaction_actors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('interaction_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('interaction_id')->references('id')->on('interactions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interaction_actors');
    }
}
