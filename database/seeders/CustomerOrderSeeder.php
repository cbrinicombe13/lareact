<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Note;
use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class CustomerOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nVariants = ProductVariant::all()->count();

        Customer::factory()
            ->count(50)
            ->has(
                Note::factory()
                    ->state(['body' => 'This is a customer note'])
            )
            ->has(
                Order::factory()
                    ->count(20)
                    ->has(
                        Note::factory()
                            ->state(['body' => 'This is an order note'])
                    )
            )
            ->create();

        // Attach up to 4 random variants per order
        $variantIds = range(1, $nVariants);
        shuffle($variantIds);
        $variantIds = array_slice($variantIds, 0, mt_rand(1, 4));
        $variants = ProductVariant::find($variantIds);

        foreach (Order::all() as $order) {
            $order->productVariants()->attach($variants);
        }
    }
}
