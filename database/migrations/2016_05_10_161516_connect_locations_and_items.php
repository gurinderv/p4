<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectLocationsAndItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
          $table->integer('location_id')->unsigned();
          $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('items', function (Blueprint $table) {
        $table->dropForeign('items_location_id_foreign');
        $table->dropColumn('location_id');
      });
    }
}
