<?php

namespace Database\Seeders;

use App\Models\Customer;
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
            ->hasOrders(20)
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
