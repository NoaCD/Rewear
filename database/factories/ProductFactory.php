<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();
        $category = Category::all()->random();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'measure' => $this->faker->word(),
            'size' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'category_id' => $category->id,
            'subcategory_id' => $subcategory->id,
            'status' => 2,
        ];
    }
}
