<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => 1,
                'title' => 'First main',
                'content' => 'First main',
                'parent_id' => null,
                'has_child' => true,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }

        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => 2,
                'title' => 'Second main',
                'content' => 'Second main',
                'parent_id' => null,
                'has_child' => true,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => 3,
                'title' => 'Third main',
                'content' => 'Third main',
                'parent_id' => null,
                'has_child' => true,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '1.1',
                'title' => 'First child first',
                'content' => 'First child first',
                'parent_id' => 1,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '1.2',
                'title' => 'Second child first',
                'content' => 'Second child first',
                'parent_id' => 1,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '1.3',
                'title' => 'Third child first',
                'content' => 'Third child first',
                'parent_id' => 1,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '2.1',
                'title' => 'First child second',
                'content' => 'First child second',
                'parent_id' => 2,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '2.2',
                'title' => 'Second child second',
                'content' => 'Second child second',
                'parent_id' => 2,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '2.3',
                'title' => 'Third child second',
                'content' => 'Third child second',
                'parent_id' => 2,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '3.1',
                'title' => 'First child third',
                'content' => 'First child third',
                'parent_id' => 3,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '3.2',
                'title' => 'Second child third',
                'content' => 'Second child third',
                'parent_id' => 3,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
        {
            $dateTime = $faker->dateTimeBetween('-1 month');
            DB::table('notes')->insert([
                'number' => '3.3',
                'title' => 'Third child third',
                'content' => 'Third child third',
                'parent_id' => 3,
                'user_id' => rand(1, 3),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
    }
}
