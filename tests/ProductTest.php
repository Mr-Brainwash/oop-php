<?php

use app\models\entities\Products;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    protected $fixture;

    protected function setUp():void
    {
        $this->fixture = new Products();
    }

    protected function tearDown():void
    {
        $this->fixture = NULL;
    }

    /**
     * @dataProvider providerProduct
     */

    public function testProduct($a, $b)
    {
        $this->assertEquals($b, $this->fixture->$a);
    }

    public function providerProduct(): array
    {
        return [
            ['name', 'Pizza'],
            ['description', 'Классическая'],
            ['category_id', 6],
            ['price', 140]
        ];
    }
}