<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->hasDictionary(100)->create();

        if (User::where('email', 'admin@admin.com')->count() == 0) {
            User::factory()->hasDictionary(100)->create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'is_admin' => true
            ]);
        }
        Article::factory(10)->hasDictionary(20)->create();



        // \App\Models\User::factory()->create([ё1236
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
