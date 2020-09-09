<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSessionInteractionRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('interactions', function (Blueprint $table) {

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
        Schema::table('interactions', function (Blueprint $table) {
            $table->dropForeign('interactions_game_session_id_foreign');
     //       $table->dropForeign('game_session_id');
            $table->dropColumn('game_session_id');
        });
    }
}
