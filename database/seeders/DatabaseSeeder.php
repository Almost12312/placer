<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\File;
use App\Models\Tag;
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

//        User::factory(10)->create();

        $admin = User::create([
            'name' => 'Дмитрий',
            'age' => 19,
            'email' => 'admin@admin.admin',
            'favorite' => json_encode([

            ]),
            'password' => Hash::make('admin'),
            'phone' => '89092097493',
            'city' => 'Moscow',
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);

        $default1 = User::create([
            'name' => 'Дефолт',
            'age' => 123,
            'email' => 'default@def.def',
            'favorite' => json_encode([

            ]),
            'password' => Hash::make('def'),
            'phone' => '89092097493',
            'city' => 'Moscow',
            'is_admin' => false,
            'remember_token' => Str::random(10)
        ]);

        $default2 = User::create([
            'name' => 'Дефолт2',
            'age' => 1232,
            'email' => 'default@def.def2',
            'favorite' => json_encode([

            ]),
            'password' => Hash::make('def'),
            'phone' => '89092097494',
            'city' => 'Moscow',
            'is_admin' => false,
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

        $product = Advertisement::create([
            'author_id' => 1,
            'title' => 'Great cars',
            'content' => 'Lorem ipsum',
            'location' => 'Moscow',
            'delete_at' => null,
            'price' => 10241,
            'category_id' => 1,
            'status' => 1
        ]);

//        $category = Tag::find([2,3]);
//        $product->tag()->attach($category);


//        Advertisement::factory(10)->create();
//        Tag::factory(20)->create();


    }
}
