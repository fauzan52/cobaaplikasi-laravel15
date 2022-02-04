<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fauzan Alghifari',
            'username' => 'fauzan52',
            'email' => 'fauzanalghifari52@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(5)->create();



        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Category::create([
            'name' => 'Networking',
            'slug' => 'networking'
        ]);

        Post::factory(50)->create();
    }
}
