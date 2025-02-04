<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'model' => fake()->randomElement(["Toyota", "BMW", "Mercedes-Benz", "Audi", "Ford", "Honda", "Nissan", "Chevrolet", "Hyundai", "Volkswagen"]),
            'year' => fake()->year(now()->subYears(25)),
            'mileage' => fake()->numberBetween(10000, 999999),
            'engine' => fake()->randomElement([
                "Petrol 1.0L", "Petrol 1.2L", "Petrol 1.4L", "Petrol 1.6L", "Petrol 2.0L",
                "Diesel 1.5L", "Diesel 1.6L", "Diesel 2.0L", "Diesel 3.0L", "Diesel 4.0L",
                "Hybrid 1.8L", "Hybrid 2.0L", "Hybrid 2.5L", "Hybrid 3.0L",
                "Electric 50 kW", "Electric 75 kW", "Electric 100 kW", "Electric 150 kW",
                "Hydrogen", "Rotary"
            ]),
            'drive' => fake()->randomElement(['AWD', 'RWD', 'FWD']),
            'transmission' => fake()->randomElement(['Automatic', 'Manual']),
            'rent_price' => fake()->numberBetween(100, 999),
            'body_type' => fake()->randomElement(['Sedan', 'Crossover', 'Hatchback', 'Wagon']),
            'preview_photo' => fake()->randomElement(['car-preview.jpg', 'car-preview2.jpg', 'car-preview3.jpg', 'car-preview4.jpg', 'car-preview5.jpg']),
            'photos' => '679b6b0752bfc-49257.jpg;679b6b0753f07-andraz-lazic-lcirqLKB8B4-unsplash.jpg;679b6b0754c2d-ivan-bonadeo-D0q3jhw0tGE-unsplash.jpg;679b6b07555a8-willian-cittadin-m6sNLX2AizY-unsplash.jpg'
        ];
    }
}
