<?php

namespace Database\Factories;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVariant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->randomFloat(2, 10, 110);
        $randDiscount = $this->faker->randomElement([
            $this->faker->randomFloat(1, 0, 1),
            1,
            1
        ]);

        return [
            'sku' => $this->sku(),
            'title' => $this->faker->words(2, true),
            'price' => $price,
            'compare_price' => $price * $randDiscount,
            'cost' => $price * $this->faker->randomFloat(1, 0.3, 0.6)
        ];
    }

    /**
     * Build a random SKU
     * 
     * @return string
     */
    public function sku()
    {
        return $this->_twoLetters() . '-' . $this->_twoNumbers() . '-' . $this->_twoLetters() . '-' . $this->_twoNumbers() . '-' . $this->_twoLetters();
    }

    private function _twoLetters()
    {
        return strtoupper($this->faker->randomLetter() . $this->faker->randomLetter());
    }

    private function _twoNumbers()
    {
        return $this->faker->randomNumber(2);
    }
}
