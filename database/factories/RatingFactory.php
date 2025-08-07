<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $bookIds = [];


    public function definition(): array
    {
        if (empty(static::$bookIds)) {
            static::$bookIds = Book::pluck('id')->toArray();
        }
        return [
            'book_id' => $this->faker->randomElement(static::$bookIds),
            'score' => $this->faker->numberBetween(1, 10),
        ];
    }
}
