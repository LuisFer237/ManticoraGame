<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $weapons = [
            ['name' => 'Gran cañón', 'cost' => 80, 'range' => 50],
            ['name' => 'Metralla',   'cost' => 60, 'range' => 40],
            ['name' => 'Mosquete',   'cost' => 50, 'range' => 30],
            ['name' => 'Pistola',    'cost' => 30, 'range' => 20],
            ['name' => 'Granada',    'cost' => 10, 'range' => 10],
        ];

        foreach ($weapons as $weapon) {
            Weapon::create($weapon);
        }
    }
}
