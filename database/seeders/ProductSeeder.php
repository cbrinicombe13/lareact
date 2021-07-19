<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()
            ->count(50)
            ->has(
                ProductOption::factory()
                    ->count(3)
                    ->state(
                        new Sequence(
                            [
                                'name' => 'Size',
                                'value' => 'Small',
                                'position' => 0
                            ],
                            [
                                'name' => 'Size',
                                'value' => 'Medium',
                                'position' => 1
                            ],
                            [
                                'name' => 'Size',
                                'value' => 'Large',
                                'position' => 2
                            ],
                        )
                    ),
                'options'
            )
            ->create();

        // Attach each product option to a variant
        foreach ($products as $product) {
            foreach ($product->options as $option) {
                $variant = ProductVariant::factory()
                    ->state(function (array $attr) use ($option) {
                        return [
                            'title' => $option->value . ' ' . $attr['title'],
                        ];
                    })
                    ->make();
                $product->variants()->save($variant);
                $variant->options()->attach($option);
            }
        }
    }
}
