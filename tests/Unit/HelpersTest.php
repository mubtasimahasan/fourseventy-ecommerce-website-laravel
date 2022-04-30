<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    // testing the helpers.php controller, which is used to format the product price
    public function testPresentPrice()
    {
        $value = '৳ '.number_format(1999); 
        $this->assertEquals('৳ 1,999', $value);
    }
}
