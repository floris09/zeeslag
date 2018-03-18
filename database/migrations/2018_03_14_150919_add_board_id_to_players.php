<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoardIdToPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t4_players', function (Blueprint $table) {
          $table->integer('board_id')->unsigned()->after('id');
          $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t4_players', function (Blueprint $table) {
          $table->dropForeign('t4_players_board_id_foreign');
          $table->dropColumn('board_id');
        });
    }
}
