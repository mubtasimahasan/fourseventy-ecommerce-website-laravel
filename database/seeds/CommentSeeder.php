<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'id' => 1,
            'user_id' => 2, 
            'post_id' => 1,
            'body' => 'wow! very cool',
            'created_at' => '2022-04-6 12:47:34',
            'updated_at' => '2022-04-6 12:47:34',
            'deleted_at' => '2022-04-6 12:47:34',
        ]);

        DB::table('comments')->insert([
            'id' => 2,
            'user_id' => 1, 
            'post_id' => 1,
            'parent_id' => 1,
            'body' => 'thanks',
            'created_at' => '2022-04-6 12:47:34',
            'updated_at' => '2022-04-6 12:47:34',
            'deleted_at' => '2022-04-6 12:47:34',
        ]);

        DB::table('comments')->insert([
            'id' => 3,
            'user_id' => 2, 
            'post_id' => 1,
            'parent_id' => 2,
            'body' => 'welcome',
            'created_at' => '2022-04-6 12:47:34',
            'updated_at' => '2022-04-6 12:47:34',
            'deleted_at' => '2022-04-6 12:47:34',
        ]);
    }
}
