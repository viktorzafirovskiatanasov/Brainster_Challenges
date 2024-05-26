<?php

include_once __DIR__ . '/Classes/Cart.php';
include_once __DIR__ . '/Classes/MarketStall.php';
include_once __DIR__ . '/Classes/Product.php';

$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 240, false);
$nuts = new Product('Nuts', 850, true);
$kiwi = new Product('Kiwi', 670, false);
$pepper = new Product('Pepper', 330, true);
$raspberry = new Product('Raspberry', 555, false);

// Create market stalls
$marketStall1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);
$marketStall2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'raspberry' => $raspberry]);

// Create a cart and add products
$cart = new Cart();
$cart->addToCart($marketStall1->getItem('orange', 3));
$cart->addToCart($marketStall1->getItem('potato', 2));
$cart->addToCart($marketStall2->getItem('kiwi', 5));

// Print receipt
$cart->printReceipt();






