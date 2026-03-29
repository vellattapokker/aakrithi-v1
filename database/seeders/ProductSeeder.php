<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['id' => 1, 'name' => 'Embroidered Kasavu Saree', 'slug' => 'embroidered-kasavu-saree', 'price' => 8999, 'category' => 'Sarees', 'badge' => 'New', 'image' => '/aakriti-laravel/public/images/prod_1.png', 'sizes' => ['S', 'M', 'L', 'XL'], 'description' => 'A stunning Kasavu saree with intricate embroidery work. Handcrafted by skilled artisans using traditional techniques and premium quality thread.'],
            ['id' => 2, 'name' => 'Designer Kerala Kurthi', 'slug' => 'designer-kerala-kurthi', 'price' => 3499, 'category' => 'Dresses', 'badge' => 'New', 'image' => '/aakriti-laravel/public/images/prod_2.png', 'sizes' => ['S', 'M', 'L'], 'description' => 'Elegant Kerala-style kurthi with vibrant embroidery and comfortable fit. Perfect for festivals and special occasions.'],
            ['id' => 3, 'name' => 'Embroidered Set-Dhavani', 'slug' => 'embroidered-set-dhavani', 'price' => 6999, 'category' => 'Sets', 'badge' => null, 'image' => '/aakriti-laravel/public/images/prod_3.png', 'sizes' => ['M', 'L', 'XL'], 'description' => 'Traditional set-dhavani with modern embroidery patterns. Includes matching blouse piece and dupatta.'],
            ['id' => 4, 'name' => 'Premium Kasavu Saree', 'slug' => 'premium-kasavu-saree', 'price' => 15999, 'category' => 'Sarees', 'badge' => null, 'image' => '/aakriti-laravel/public/images/prod_4.png', 'sizes' => ['Universal'], 'description' => 'Premium quality Kasavu saree with golden zari border. A timeless piece for your ethnic wardrobe.'],
            ['id' => 5, 'name' => 'Traditional Kerala Set', 'slug' => 'traditional-kerala-set', 'price' => 5499, 'category' => 'Sets', 'badge' => null, 'image' => '/aakriti-laravel/public/images/prod_5.png', 'sizes' => ['S', 'M', 'L'], 'description' => 'Classic Kerala set mundu with traditional motifs. Comfortable and elegant for everyday wear.'],
            ['id' => 6, 'name' => 'Classic Embroidered Saree', 'slug' => 'classic-embroidered-saree', 'price' => 12999, 'category' => 'Sarees', 'badge' => null, 'image' => '/aakriti-laravel/public/images/prod_6.png', 'sizes' => ['Universal'], 'description' => 'Beautifully embroidered saree with detailed peacock motifs. A masterpiece of traditional craftsmanship.'],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
