<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
            'name' => 'Star',
            'MXN' => 100,
            'USD' => 9.99
            ],
            [
            'name' => 'Plus',
            'MXN' => 90,
            'USD' => 8.99
            ],
            [
            'name' => 'Top',
            'MXN' => 80,
            'USD' => 7.99
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
