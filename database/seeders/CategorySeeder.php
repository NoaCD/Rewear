<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Hombre',
                'slug' => Str::slug('Hombre'),
            ],
            [
                'name' => 'Mujer',
                'slug' => Str::slug('Mujer'),
            ],
        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();
        }

    }
}
