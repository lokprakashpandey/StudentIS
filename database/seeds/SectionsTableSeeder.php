<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sections')->insert([
            ['sectionname' => 'A'],
        	['sectionname' => 'B'],
        	]);
    }
}
