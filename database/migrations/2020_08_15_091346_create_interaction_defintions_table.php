<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionDefintionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interaction_defintions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interaction_object_id');
            $table->string('name')->nullable();
            // $table->string('type')->default(0);
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
        Schema::dropIfExists('interaction_defintions');
    }
}
