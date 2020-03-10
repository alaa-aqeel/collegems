<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fourth
        DB::table('stages')->insert([
            ['stage' => 'primary'],
            ['stage' => 'second'],
            ['stage' => 'three'],
            ['stage' => 'fourth'],
        ]);
    }
}
