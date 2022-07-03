<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            DoctorsTableSeeder::class,
            ContentsTableSeeder::class,
            CommentsTableSeeder::class,
            CommentsTableSeeder::class,
            RepliesTableSeeder::class,
        ]);
    }
}
