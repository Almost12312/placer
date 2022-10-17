<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(10)->create();

        User::create([
            'name' => 'Дмитрий',
            'age' => '19',
            'email' => 'admin@admin.admin',
            'favorite' => json_encode([

            ]),
            'password' => Hash::make('admin'),
            'phone' => '89092097493',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);

        Category::create([
           'name' => 'cars'
        ]);

        Category::create([
            'name' => 'phones'
        ]);
        Category::create([
            'name' => 'moto'
        ]);
    }
}
