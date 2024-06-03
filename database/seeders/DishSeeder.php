<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = config('boolivery.dishes');

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->image = $dish['image'];
            $newDish->description = $dish['description'];
            $newDish->ingredients = implode(',', $dish['ingredients']);
            $newDish->price = $dish['price'];
            $newDish->visible = $dish['visible'];
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->save();
        }
    }
}
