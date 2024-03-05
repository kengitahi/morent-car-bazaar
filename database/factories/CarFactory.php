<?php

namespace Database\Factories;

// use Vendor\alirezasedghi\laravelimagefaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence;
        $slug = Str::slug($name, "-");

        $imageFaker = new ImageFaker(new Picsum());

        return [
            'id' => $this->faker->uuid,
            'name' => $name,
            'slug' => $slug,
            'short_description' => $this->faker->paragraph,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'type' => $this->faker->randomElement(['sport', 'SUV', 'sedan', 'hatchback', 'MPV', 'coupe']),
            'capacity' => $this->faker->randomElement([2, 4, 6, 8]),
            'steering' => $this->faker->randomElement(['manual', 'automatic']),
            'regular_price' => $this->faker->numberBetween(2000, 150000),
            'discounted_price' => $this->faker->numberBetween(1000, 120000),
            'fuel' => $this->faker->randomElement(['gasoline', 'electric']),
            'fuel_capacity' => $this->faker->numberBetween(10, 100),
            'range' => $this->faker->numberBetween(100, 550),
            'is_available' => $this->faker->boolean(),
            'is_featured' => $this->faker->boolean(),
            'rent_date' => $this->faker->dateTimeInInterval('now', '+14 days'),
            'return_date' => $this->faker->dateTimeInInterval('+1 day', '+14 days'),
            'images' => $imageFaker->imageUrl(),
            // 'images' => $this->faker->imageUrl(width: 640, height: 480),

        ];
    }
}
