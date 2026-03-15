<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Ng Viet Thanh Toan',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create 4 authors
        $authors = Author::factory(4)->create();

        // Create 5 categories
        $categories = Category::factory(5)->create();

        // Create 20 books distributed among the authors and categories
        Book::factory(20)->create([
            'author_id' => $authors->random(),
            'category_id' => $categories->random(),
        ]);
    }
}
