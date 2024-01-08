<?php
namespace App;
use PHPUnit\Framework\TestCase;
class Product{
    private $name;
    private $quantity;
    public function_construct($name,$quantity){
        $this->name = $name;
        $this->quantity =$quantity;
    }

    public function increaseQuantity($quantity){
        if($quantity<=0){
            throw new\InvalidArgumentException('Qyantity cannot be zaro');
        }
            
        $this->quantity = $this->quantity + $quantity;

    }

    public function getQuantity(){
        return this->quantity;
    }

    public function decreaseQuantity($quantity){
        $this->quantity = $this->quantity - $quantity;

    }
}
