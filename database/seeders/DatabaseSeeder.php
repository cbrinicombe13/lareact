<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a user
        User::create([
            'first_name' => 'Charlie',
            'last_name' => 'Brinicombe',
            'email' => 'cbrinicombe13@googlemail.com',
            'password' => app('hash')->make('Password1'),
        ]);

        // Create customers
        Customer::factory()->count(50)->create();

        // Craete products, options and variants
        $this->call(ProductSeeder::class);
    }
}
