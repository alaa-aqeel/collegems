<?php

use Illuminate\Database\Seeder;
// use DateTime;
class TraniningTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('traninings')->insert([
            'text' => 'Learn how to use Git and Github with alaa akiel',
            'support' => 'Code For Iraq', 
            'at' => \DateTime::createFromFormat('Y-m-d', '2020-04-1')
        ]);
    }
}
