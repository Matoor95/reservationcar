<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;


class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        Car::create([
            'libelle' => 'Toyota Corolla',
            'model' => 'Corolla',
            'year' => 2021,
            'seats' => 5,
            'price_per_day' => 45.99,
            'chemin' => $faker->imageUrl(640, 480, 'transport', true, 'Toyota Corolla'),
        ]);

        Car::create([
            'libelle' => 'Honda Civic',
            'model' => 'Civic',
            'year' => 2020,
            'seats' => 5,
            'price_per_day' => 50.00,
            'chemin' => $faker->imageUrl(640, 480, 'transport', true, 'Honda Civic'),
        ]);

        Car::create([
            'libelle' => 'Ford Mustang',
            'model' => 'Mustang',
            'year' => 2019,
            'seats' => 4,
            'price_per_day' => 120.75,
            'chemin' => $faker->imageUrl(640, 480, 'transport', true, 'Ford Mustang'),
        ]);

        Car::create([
            'libelle' => 'Chevrolet Camaro',
            'model' => 'Camaro',
            'year' => 2018,
            'seats' => 4,
            'price_per_day' => 115.00,
            'chemin' => $faker->imageUrl(640, 480, 'transport', true, 'Chevrolet Camaro'),
        ]);

        Car::create([
            'libelle' => 'Tesla Model S',
            'model' => 'Model S',
            'year' => 2022,
            'seats' => 5,
            'price_per_day' => 150.00,
            'chemin' => $faker->imageUrl(640, 480, 'transport', true, 'Tesla Model S'),
        ]);
    }
}
