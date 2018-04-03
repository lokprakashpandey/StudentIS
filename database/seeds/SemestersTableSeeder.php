<?php

use Illuminate\Database\Seeder;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            ['semestername' => 'Semester I'],
        	['semestername' => 'Semester II'],
        	['semestername' => 'Semester III'],
        	['semestername' => 'Semester IV'],
        	['semestername' => 'Semester V'],
        	['semestername' => 'Semester VI'],
        	['semestername' => 'Semester VII'],
        	['semestername' => 'Semester VIII'],
        	]);
    }
}
