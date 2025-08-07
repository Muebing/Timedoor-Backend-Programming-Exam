<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Rating;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Author::factory(1000)->create();
        // Categories::factory(3000)->create();

        // $batchSize = 10000;
        // for ($i = 0; $i < 10; $i++) {
        //     Book::factory($batchSize)->create();
        // }

        $ratingBatchSize = 50000;
        for ($i = 0; $i < 10; $i++) {
            Rating::factory($ratingBatchSize)->create();
        }
    }
}
