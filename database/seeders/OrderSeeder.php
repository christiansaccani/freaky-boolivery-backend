<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// use Faker\Factory as Faker;

class OrderSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // $faker = \Faker\Factory::create('it_IT');

        //create 10 orders

        for ($i = 0; $i < 173; $i++) {
            $newOrder = new Order();
            $newOrder->total_price = $faker->randomFloat(2, 8, 60);
            $newOrder->customer_name = $faker->firstName;
            $newOrder->customer_last_name = $faker->lastName;
            $newOrder->customer_address = $faker->unique()->safeEmail;
            $newOrder->customer_email = $faker->address;
            $newOrder->customer_phone = $faker->phoneNumber;
            $newOrder->customer_note = $faker->optional()->sentence;
            $newOrder->created_at = $faker->dateTimeBetween('2024-01-01', '2024-06-03');
            $newOrder->save();
        }
    }
}
