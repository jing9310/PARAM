<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('doctors')->insert([
        //     'name'              => 'doctor',
        //     'email'             => 'doctor@example.com',
        //     'password'          => Hash::make('password'),
        //     'remember_token'    => Str::random(10),
        // ]);
        factory(App\Models\Doctor::class, 15)->create();

    }
}
