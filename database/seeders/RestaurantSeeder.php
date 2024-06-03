<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $restaurants = config('boolivery.restaurants');

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->image = $restaurant['image'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->phone = $restaurant['phone'];
            $newRestaurant->vat = $restaurant['vat'];
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->save();
        }
    }
}
