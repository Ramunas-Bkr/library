<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
// use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'briedis@aa.bb',
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'briedis2@aa.bb',
            'password' => Hash::make('123')
        ]);

        foreach (range(1,100) as $val)
        DB::table('authors')->insert([
            'name' => $faker->firstName(),
            'surname' => $faker->lastName(),
            
        ]);
    }
}
