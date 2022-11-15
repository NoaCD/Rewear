<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
        [
            'name'=>'white',
            'bgcolor' => '#ffffff',
            'txtcolor' => '#000000',
        ],
        [
            'name'=>'blue',
            'bgcolor' => '#00AEF9',
            'txtcolor' => '#000000'
        ],
        ];

        foreach ($colors as $color) {
            Color::factory(1)->create($color)->first();
        }
    }
}
