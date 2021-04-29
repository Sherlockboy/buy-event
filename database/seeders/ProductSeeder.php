<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Backpack',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit In odit',
            'price' => 220,
            'image' => 'backpack.jpg'
        ]);

        Product::create([
            'title' => 'Iphone 12 Pro',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit In odit',
            'price' => 1250,
            'image' => 'iphone.jpg'
        ]);

        Product::create([
            'title' => 'Headphones',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit In odit',
            'price' => 130,
            'image' => 'headphones.jpg'
        ]);

        Product::create([
            'title' => 'Smart watch',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit In odit',
            'price' => 540,
            'image' => 'smart-watch.jpg'
        ]);
    }
}
