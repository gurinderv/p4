<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

      Schema::create('locations', function (Blueprint $table) {

          # Increments method will make a Primary, Auto-Incrementing field.
        $table->increments('id');

          # This generates two columns: `created_at` and `updated_at` to
          # keep track of changes to a row
        $table->timestamps();

        $table->string('location_name');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('locations');
    }
}
