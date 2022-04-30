<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;


class ShopControllerTest extends TestCase
{
    // testing the index function which returns shop view file 
    // also if /shop route is accessible 
    // also if $post variable is able to get all six product
    public function testIndex()
    {
        $response = $this->get('/shop');
        $response->assertStatus(200);
        $response->assertViewHas('products');
        $products = Product::inRandomOrder()->take(12)->get();
        $this->assertEquals(6, count($products));  
    }

    // testing the show method which returns the product view file
    // also if /shop/{$slug} page is OK
    public function testShow()
    {
        $slug = 'xbox-360';
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        $response = $this->get('/shop/xbox-360', [
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike]);
        $response->assertStatus(200);
    }
}
