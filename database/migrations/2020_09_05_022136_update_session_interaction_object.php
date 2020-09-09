<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSessionInteractionObject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('interaction_objects', function (Blueprint $table) {

            $table->unsignedBigInteger('game_session_id')->nullable;
            $table->foreign('game_session_id')->references('id')->on('game_sessions')
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
        Schema::table('interaction_objects', function (Blueprint $table) {

            $table->dropForeign('interaction_objects_game_session_id_foreign');
            $table->dropColumn('game_session_id');
        });
    }
}
