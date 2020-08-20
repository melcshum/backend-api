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
            $table->dropColumn('session_id');
            $table->dropForeign('session_id');
        });
    }
}
