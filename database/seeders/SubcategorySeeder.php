<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Corta',
            ],
            [
                'category_id' => 1,
                'name' => 'Larga',
            ],
            [
                'category_id' => 2,
                'name' => 'Corta',
            ],
            [
                'category_id' => 2,
                'name' => 'Larga',
            ],
        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
