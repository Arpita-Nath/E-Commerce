<?php

namespace App\Unit;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase{

    public function testIfIncreaseQuantityFunctionWork(){
        $product = new Product('Apple',5);

        $product->increaseQuantity(2);

        $this->assertEquals(7, $product->getQuantity());
    }


    public function testIfQuantityZero(){

        $product = new Product('Apple',5);

        $this->getExpectedException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantity cannot be zero');

        $product->increaseQuantity(0);

        $this->assertEquals(5, $product->getQuantity());
    }

    public function testThatDecreaseFunctionWork(){
        $product = new Product('Mango',3);

        $product->decreaseQuantity(2);

        $this->assertEquals(1, $product->getQuantity());
    }


    public function testIfQuantityLessThanZeroMakeItZero(){
        $product = new Product('Mango',3);

        $product->decreaseQuantity(4);

        $this->assertEquals(0, $product->getQuantity());
    }

}