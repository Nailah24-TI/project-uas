<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CreateUserDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        foreach (range(1, 100) as $index) {
        DB::table('users')->insert([
            'name' => $faker->name,
            'email'      => $faker->unique()->safeEmail,
            'password'          => Hash::make('password'),
            'role'              => 'user',
        ]);
    }
    }
}
