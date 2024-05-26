<?php
class MarketStall {
    private $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    public function addProductToMarket(Product $product) {
        $this->products[$product->getName()] = $product;
    }

    public function getItem($name, $amount) {
        if (array_key_exists($name, $this->products)) {
            return ['amount' => $amount, 'item' => $this->products[$name]];
        } else {
            return false;
        }
    }
}