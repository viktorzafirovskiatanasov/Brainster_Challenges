<?php


class Cart {
    private $cartItems = [];

    public function addToCart($item) {
        $this->cartItems[] = $item;
    }

    public function printReceipt() {
        if (empty($this->cartItems)) {
            return "Your cart is empty.";
        }

        $totalPrice = 0;
        foreach ($this->cartItems as $cartItem) {
            $name = $cartItem['item']->getName();
            $amount = $cartItem['amount'];
            $price = $cartItem['item']->getPrice();
            $isKg = $cartItem['item']->isSoldByKg();
            $subtotal = $isKg ? ($amount * $price) : ($amount * $price);

            echo "$name | $amount " . ($isKg ? 'kgs' : 'gunny sacks') . " | total= $subtotal denars\n";
            $totalPrice += $subtotal;
        }

        echo "Final price amount: $totalPrice denars\n";
    }
}

