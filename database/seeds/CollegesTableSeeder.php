<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([
            [
                'name' => 'college of math',
                'slug' => 'college-of-math'
            ],
            [
                'name' => 'college of computer',
                'slug' => 'college-of-computer'
            ],
        ]);
    }
}
