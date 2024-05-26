<?php

require_once 'Interfaces/Product.php';
require_once 'Classes/MarketStall.php';
require_once 'Classes/Cart.php';
require_once 'ProductClasses/Orange.php';
require_once 'ProductClasses/Kiwi.php';
require_once 'ProductClasses/Potato.php';
require_once 'ProductClasses/Nuts.php';
require_once 'ProductClasses/Strawberry.php';
require_once 'ProductClasses/Banana.php';


$orange = new Orange('Orange', 35, true);
$potato = new Potato('Potato', 240, false);
$nuts = new Nuts('Nuts', 850, true);
$kiwi = new Kiwi('Kiwi', 670, false);
$banana = new Banana('Banana', 330, true);
$strawberry = new Strawberry('Strawberry', 555, false);

$marketStall1 = new MarketStall(['Orange' => $orange, 'Potato' => $potato, 'Nuts' => $nuts]);
$marketStall2 = new MarketStall(['Kiwi' => $kiwi, 'Strawberry' => $strawberry, 'Banana' => $banana]);

$cart = new Cart();
$cart->addToCart($marketStall1->getItem('Orange', 3));
$cart->addToCart($marketStall2->getItem('Kiwi', 2));
$cart->addToCart($marketStall2->getItem('Strawberry', 1));

$cart->printReceipt();







