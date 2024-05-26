<?php


class Cart {
    private $cartItems = [];

    public function addToCart($item) {
        $this->cartItems[] = $item;
    }

    public function printReceipt() {
        if (empty($this->cartItems)) {
            return "Your cart is empty";
        }

        $totalPrice = 0;

        foreach ($this->cartItems as $cartItem) {
            $item = $cartItem['item'];
            $amount = $cartItem['amount'];
            $total = $item->getPrice() * $amount;

            echo "{$item->name} | ";
            if ($item->sellingByKg) {
                echo "$amount kgs";
            } else {
                echo "$amount gunny sacks";
            }
            echo " | total= $total denars\n";

            $totalPrice += $total;
        }

        echo "Final price amount: $totalPrice denars";
    }
}
