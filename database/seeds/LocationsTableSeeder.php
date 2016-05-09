<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'location_name' => 'under stairs',
        ]);

       DB::table('locations')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'location_name' => 'kitchen pantry',
        ]);

    }
}
