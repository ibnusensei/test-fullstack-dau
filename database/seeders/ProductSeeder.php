<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory()->count(1)->create();

        $data = [
            [
                'name' => 'Nike Sneakers',
                'price' => 1200,
                'stock' => 15,
                'description' => 'High-quality Nike sneakers for sports and casual wear.',
            ],
            [
                'name' => 'Samsung Galaxy S21',
                'price' => 999,
                'stock' => 8,
                'description' => 'The latest Samsung smartphone with amazing features.',
            ],
            [
                'name' => 'Apple MacBook Pro',
                'price' => 2000,
                'stock' => 5,
                'description' => 'Powerful MacBook Pro for professionals and creatives.',
            ],
            [
                'name' => 'Sony 55-Inch 4K TV',
                'price' => 899,
                'stock' => 12,
                'description' => 'Immerse yourself in stunning 4K visuals with this Sony TV.',
            ],
            [
                'name' => 'Canon EOS Rebel T7i',
                'price' => 799,
                'stock' => 7,
                'description' => 'Capture beautiful photos with the Canon EOS Rebel T7i camera.',
            ],
            [
                'name' => 'Bose QuietComfort 35 II',
                'price' => 349,
                'stock' => 20,
                'description' => 'Premium noise-canceling headphones for ultimate audio experience.',
            ],
            [
                'name' => 'Dell XPS 13 Laptop',
                'price' => 1299,
                'stock' => 10,
                'description' => 'Ultra-thin and powerful Dell XPS 13 laptop for work and play.',
            ],
            [
                'name' => 'LG UltraWide Monitor',
                'price' => 499,
                'stock' => 6,
                'description' => 'Wide-screen LG monitor for multitasking and gaming.',
            ],
            [
                'name' => 'Adidas Running Shoes',
                'price' => 899,
                'stock' => 14,
                'description' => 'Comfortable Adidas running shoes for athletes.',
            ],
            [
                'name' => 'Sony PlayStation 5',
                'price' => 499,
                'stock' => 3,
                'description' => 'Next-gen gaming console with incredible graphics and performance.',
            ],
        ];

        foreach ($data as $product) {
            Product::create($product);
        }
        
    }
}
