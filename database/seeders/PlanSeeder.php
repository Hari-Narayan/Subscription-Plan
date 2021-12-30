<?php

namespace Database\Seeders;

use App\Models\Plan;

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $data = ['Basic', 'Bronze', 'Silver', 'Gold', 'Platinum', 'Dimond'];

        foreach ($data as $value) {
            Plan::create([
                'title' => $value,
                'min_package' => random_int(1, 3),
                'weekly_price' => rand(100, 999),
                'monthly_price' => rand(100, 999),
            ]);
        }
    }
}
