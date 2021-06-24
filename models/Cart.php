<?php

class Cart {

    static public function updateQuantity($productId, $quantity) {
        $_SESSION["cart"][$productId] = $quantity;

        return $_SESSION["cart"][$productId];
    }

    static public function remove($productId) {
        unset($_SESSION["cart"][$productId]);
    }

    static public function add($productId, $quantity) {
        // $quantity = (isset($quantity)) ? $quantity : 1;

        if(isset($_SESSION["cart"][$productId])) {
            $_SESSION["cart"][$productId] += $quantity;
        } else {
            $_SESSION["cart"][$productId] = $quantity;
        }
    }

    static public function productQuantity($productId) {
        if(isset($_SESSION["cart"][$productId])){
            return $_SESSION["cart"][$productId];
        }
    }

    static public function numberInCart() {
        if(isset($_SESSION["cart"])) {
            return array_sum($_SESSION["cart"]);
        } else {
            return 0;
        }
    }

    static public function getProducts() {
        $arrProducts = array();
        foreach($_SESSION["cart"] as $productId=>$quantity) {
            $arrProducts[] = Product::get($productId);
        }
        return $arrProducts;
    }

    static public function subTotal() {
        $totalPrice = 0;
        foreach($_SESSION["cart"] as $productId=>$quantity) {
            $totalPrice = $totalPrice + (Product::get($productId)->price*$quantity);
        }
        return $totalPrice;
    }

    static public function taxes() {
        $subtotal = Cart::subTotal();
        $gst = 5;
        $pst = 7;
        $tax = $gst+$pst;
        $totalTax = ($subtotal * $tax)/100;
        return $totalTax;
    }

    static public function total() {
        $subtotal = Cart::subTotal();
        $taxes = Cart::taxes();
        $total = $subtotal+$taxes;

        return $total;
    }

    static public function empty() {
        $_SESSION["cart"] = array();
    }
}

?>