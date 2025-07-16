<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Logitech Wireless Mouse',
            'description' => 'Ergonomic wireless mouse with long battery life',
            'price' => 1200,
            'stock_quantity' => 50,
            'image' => 'products/1.jpg', // Optional: make sure the image exists in storage
        ]);
    }
}
