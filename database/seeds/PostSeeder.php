<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'title'=> 'Just Brought a MacBook!', 
            'body'=> '<p>Just brought a macbook from this website! Im so happy! Cant wait to buy more. :3</p>',
            'created_at' => '2022-03-30 02:10:14',
            'updated_at' => '2022-03-30 02:10:14',
            'user_id' => 1,
            'cover_image'=> 'image1_1651084397.jpg',
        ]);

        DB::table('posts')->insert([
            'id' => 2,
            'title'=> 'best vinyl album ever!!', 
            'body'=> 'bowie is a god',
            'created_at' => '2022-04-12 10:02:54',
            'updated_at' => '2022-04-12 10:02:54',
            'user_id' => 2,
            'cover_image'=> 'image2_1642384397.jpg',
        ]);
    }
}
