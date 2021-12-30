<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Package;

use Faker\Factory;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $data = ['US Sports', 'AU Sports', 'EU Football', 'AU Horse Racing', 'GE Sports', 'HR Sports', 'IN Sports'];
        $faker = Factory::create();

        foreach ($data as $value) {
            Package::create([
                'title' => $value,
                'description' => substr($faker->text, 0, 200),
            ]);
        }
    }
}
