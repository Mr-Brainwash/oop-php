<?php

use app\models\entities\Products;

class ProductPropsTest extends \PHPUnit\Framework\TestCase
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
     * @dataProvider providerProps
     */

    public function testProps($a)
    {
        $this->assertFalse($this->fixture->props[$a]);
    }

    public function providerProps(): array
    {
        return [
            ['name'],
            ['description'],
            ['category_id'],
            ['price']
        ];
    }
}