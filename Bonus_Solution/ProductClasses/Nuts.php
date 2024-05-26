<?php

class Nuts implements Product {
    private $name;
    private $price;
    private $sellingByKg;

    public function __construct($name, $price, $sellingByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function isSoldByKg() {
        return $this->sellingByKg;
    }
}