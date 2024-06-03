<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = config('boolivery.types');

        foreach ($types as $type) {
            $newType = new Type();
            $newType->type = $type['type'];
            $newType->save();
        }
    }
}
