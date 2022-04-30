<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'MacBook Pro 2015',
            'slug' => 'macbook',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 50000,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        ]);

        Product::create([
            'name' => 'David Bowie - Aladdin Sane Vinyl Album',
            'slug' => 'album-1',
            'details' => 'UK 1st Pressing, LP Album, 1973',
            'price' => 10000,
            'description' => 'This album comes in a gatefold sleeve with printed inner sleeve containing lyrics for the songs except for the cover version of Lets Spend The Night Together. Initial copies included a David Bowie Fan Club application card.',
        ]);

        Product::create([
            'name' => 'Groovy Baby 70s Retro Graphic T-Shirt',
            'slug' => 'tshirt-1',
            'details' => 'Seventies Vintage, t-shirt',
            'price' => 1000,
            'description' => 'Seventies themed Groovy Baby t-shirt makes an awesome nostalgic outfit for women and men who love the 70s style. Perfect gift for fans of the seventies groovy era. Awesome for 70s themed parties or an addition to Halloween costumes.',
        ]);

        Product::create([
            'name' => 'Nokia 3310  Phone Only a Grade',
            'slug' => 'phone-1',
            'details' => '2g, (ta-1008), Red Unlocked',
            'price' => 1000,
            'description' => 'Its a Refurbished Phone and comes on its OWN. No Charging Cable, Adaptor or Box neither handsfree included). Its a Basic Phone so No Internet.',
        ]);

        Product::create([
            'name' => 'PlayStation 2 Console Slim PS2',
            'slug' => 'ps-2',
            'details' =>'DVD playback, Digital surround sound,2 memory card slots',
            'price' => 15000,
            'description' => 'This original system and all its games and accessories are fully refurbished, cleaned, and tested. Our systems are in good used condition and play like new and are free from most cosmetic flaws.',
        ]);

        Product::create([
            'name' => 'Xbox 360 Slim Console',
            'slug' => 'xbox-360',
            'details' => '4GB, 4GB RAM',
            'price' => 14000,
            'description' => 'This pre-owned or refurbished product has been professionally inspected and tested to work and look like new.',
        ]);
    }
}
