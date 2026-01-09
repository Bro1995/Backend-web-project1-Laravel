<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    // This function inserts sample products into the database
    public function run(): void
    {
        // Simple sample data for the shop homepage
        $items = [
            [
                'name' => 'Wireless Gaming Mouse',
                'price' => 4999, // 49.99
                'brand' => 'HyperTech',
                'category' => 'Accessories',
                'image_path' => 'products/mouse.jpg',
                'short_description' => 'Fast response and comfy grip for long sessions.',
                'stock' => 24,
                'is_featured' => true,
            ],
            [
                'name' => 'Mechanical Keyboard (Blue Switch)',
                'price' => 7999,
                'brand' => 'KeyForge',
                'category' => 'Accessories',
                'image_path' => 'products/keyboard.jpg',
                'short_description' => 'Clicky feel, solid build, and a clean layout.',
                'stock' => 15,
                'is_featured' => true,
            ],
            [
                'name' => '27" IPS Monitor 144Hz',
                'price' => 19999,
                'brand' => 'ViewPrime',
                'category' => 'Displays',
                'image_path' => 'products/monitor.jpg',
                'short_description' => 'Smooth motion and sharp colors for work and gaming.',
                'stock' => 8,
                'is_featured' => true,
            ],
            [
                'name' => 'USB-C Docking Station',
                'price' => 8999,
                'brand' => 'DockMate',
                'category' => 'Workstation',
                'image_path' => 'products/dock.jpg',
                'short_description' => 'One cable setup: HDMI, USB, Ethernet, and charging.',
                'stock' => 12,
                'is_featured' => false,
            ],
            [
                'name' => 'External SSD 1TB',
                'price' => 10999,
                'brand' => 'FlashPro',
                'category' => 'Storage',
                'image_path' => 'products/ssd.jpg',
                'short_description' => 'Quick backups and fast file transfers in a compact case.',
                'stock' => 20,
                'is_featured' => false,
            ],
            [
                'name' => 'Wi-Fi 6 Router',
                'price' => 12999,
                'brand' => 'NetCore',
                'category' => 'Networking',
                'image_path' => 'products/router.jpg',
                'short_description' => 'Stable connection, better range, and good performance.',
                'stock' => 10,
                'is_featured' => false,
            ],
        ];

        foreach ($items as $item) {
            // We create a slug from the name
            $slug = Str::slug($item['name']);

            // updateOrCreate:
            // - If product with the same slug exists, update it
            // - If not, create a new record
            Product::updateOrCreate(
                ['slug' => $slug],
                array_merge($item, ['slug' => $slug])
            );
        }
    }
}
