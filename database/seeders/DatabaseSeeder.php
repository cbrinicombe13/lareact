<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'first_name' => 'Charlie',
            'last_name' => 'Brinicombe',
            'email' => 'cbrinicombe13@googlemail.com',
            'password' => app('hash')->make('Password1'),
        ]);
    }
}
