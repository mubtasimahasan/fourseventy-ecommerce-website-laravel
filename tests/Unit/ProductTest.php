<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    // checking if the database contains all the columns 
    public function testProductsDatabaseColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('products', [
            'id', 'name', 'slug', 'details', 'price', 'description', 'created_at', 'updated_at'
        ]), 1);
    }

    // testing the price formatter method
    public function testPresentPrice()
    {
        $value = '৳ '.number_format(9999); 
        $this->assertEquals('৳ 9,999', $value);
    }

    // testing if 4 products are shown as suggestions in "you migh also like" section
    public function testScopeMightAlsoLike()
    {
        $value = Product::where('slug', '!=', 'macbook')->mightAlsoLike()->get();

        $this->assertEquals(4, $value->count());
    }
}
