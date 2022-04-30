<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageControllerTest extends TestCase
{
    // testing the index method which shows the landing-page view file
    // and $product contains all six products
    // also if '/' route is OK
    public function testIndex()
    {  
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('products');
        $products = Product::inRandomOrder()->take(8)->get();
        $this->assertEquals(6, count($products));  
    }
}
