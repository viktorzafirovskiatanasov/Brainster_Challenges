<?php


class Product {
    public $name;
    public $price;
    public $sellingByKg;

    public function __construct($name, $price, $sellingByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getPrice() {
        return $this->price;
    }
}