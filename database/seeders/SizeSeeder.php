<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                'name' => 'small',
                'code' => 'S'
            ],
            [
                'name' => 'medium',
                'code' => 'M'
            ],
            [
                'name' => 'large',
                'code' => 'L'
            ],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
