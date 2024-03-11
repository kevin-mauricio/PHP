<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(150)->create();

        /*Product::create([
            'name' => 'Example 1',
            'short_description' => 'Lorem ipsum',
            'description' => 'Lorem ipsum dolor set',
            'price' => 25
        ]);

        Product::create([
            'name' => 'Example 2',
            'short_description' => 'Lorem ipsum',
            'description' => 'Lorem ipsum dolor set',
            'price' => 30
        ]);

        Product::create([
            'name' => 'Example 3',
            'short_description' => 'Lorem ipsum',
            'description' => 'Lorem ipsum dolor set',
            'price' => 20
        ]); */
    }
}
