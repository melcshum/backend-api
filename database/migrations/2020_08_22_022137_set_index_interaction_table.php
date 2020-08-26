<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class SetIndexInteractionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('interaction_definitions', function (Blueprint $table) {
            $table->string('game_session_id')->Nullable();
        });

        Schema::table('interaction_actions', function (Blueprint $table) {
            $table->index(['name']);
        });


        Schema::table('interaction_definitions', function (Blueprint $table) {

            $table->index(['name']);
        });

        Schema::table('interaction_extensions', function (Blueprint $table) {
            $table->index(['name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interaction_definitions', function (Blueprint $table) {

            $table->dropColumn('game_session_id');
        });


        Schema::table('interaction_actions', function (Blueprint $table) {
            $table->dropIndex(['name']);
        });

        Schema::table('interaction_definitions', function (Blueprint $table) {

            $table->dropIndex(['name']);
        });

        Schema::table('interaction_extensions', function (Blueprint $table) {

            $table->dropIndex('name');
        });
    }
}
