<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location_id = \App\Location::where('location_name','=','under stairs')->pluck('id')->first();
        DB::table('items')->insert([
          'created_at' => \Carbon\Carbon::now()->toDateTimestring(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimestring(),
          'item_name' => 'Toothbrush',
          'item_description' => 'tool for cleaning teeth',
          'location_id' => $location_id
        ]);

        DB::table('items')->insert([
          'created_at' => \Carbon\Carbon::now()->toDateTimestring(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimestring(),
          'item_name' => 'Bucket',
          'item_description' => 'for holding water',
          'location_id' => 2
        ]);
    }
}
