<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Washing Machine',
                'category' => 'Electronics',
                'price' => 19999.99,
                'color' => 'Red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zara T-shirt',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'Green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop',
                'category' => 'Electronics',
                'price' => 299999.99,
                'color' => 'Black',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zara T-shirt xl',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'Blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'varsaachi T-shirt',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'White',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zara T-shirt',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'Green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zara T-shirt',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'Green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'pents',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'Red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'T-shirt',
                'category' => 'Clothing',
                'price' => 2999.99,
                'color' => 'Green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'category' => 'Electronics',
                'price' => 159999.00,
                'color' => 'Titanium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nike Air Max',
                'category' => 'Footwear',
                'price' => 7499.99,
                'color' => 'White',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'One Plus 15 Pro Max',
                'category' => 'Electronics',
                'price' => 159999.00,
                'color' => 'Titanium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumsang 15 Pro Max',
                'category' => 'Electronics',
                'price' => 159999.00,
                'color' => 'Titanium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($data); 
    }
}
