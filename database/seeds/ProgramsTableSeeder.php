<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            ['programname' => 'BIM'],
        	['programname' => 'BSc CSIT'],
        	]);
    }
}
