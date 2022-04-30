<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Keramot Ullah',
            'email' => 'keramot@gmail.com',
            'password' => bcrypt('keramot1234'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Matha Nostho',
            'email' => 'matha@gmail.com',
            'password' => bcrypt('matha1234'),
        ]);
    }
}
