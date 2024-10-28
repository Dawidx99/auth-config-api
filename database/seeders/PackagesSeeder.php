<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Packages;

class PackagesSeeder extends Seeder
{
    public function run(): void
    {
        Packages::create([
            'name' => 'Pakiet Testowy',
            'description' => 'Przetestuj możliwości platformy już teraz',
            'pricePerMonth' => 0,
            'pricePerYear' => 0,
            'integrationsLimit' => 2,
            'productsLimit' => 10000,
        ]);

        Packages::create([
            'name' => 'Pakiet Mini',
            'description' => 'Najtańszy dostępny pakiet',
            'pricePerMonth' => 100,
            'pricePerYear' => 1050,
            'integrationsLimit' => 3,
            'productsLimit' => 20000,
        ]);

        Packages::create([
            'name' => 'Pakiet Standard',
            'description' => 'Standardowy pakiet',
            'pricePerMonth' => 300,
            'pricePerYear' => 3100,
            'integrationsLimit' => 10,
            'productsLimit' => 200000,
        ]);

        Packages::create([
            'name' => 'Pakiet Premium',
            'description' => 'Najwyższy pakiet pozwalający korzystać z pełni możliwości platformy',
            'pricePerMonth' => 500,
            'pricePerYear' => 5500,
            'integrationsLimit' => 30,
            'productsLimit' => 500000,
        ]);
    }
}
