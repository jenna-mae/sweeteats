<?php

class CartController extends Controller {
    public function checkout() {
        if($_SESSION["cart"]) {
            $this->state["user"] = User::currentUser();
            $this->state["browserTitle"] = "Checkout";
    
            $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/cart.css'>";
    
            $this->state["footer"] = $this->loadView("footer");
            $this->state["content"] = $this->loadView("nav");
            $this->state["content"] .= $this->loadView("checkout");
    
            $this->state["html"] = $this->loadView("template");
        } else {
            header("location: index.php?controller=cart&action=showCart&error");
        }
    }

    public function add() {
        Cart::add($_GET["productId"], 1);
        header("location: index.php?controller=pages&action=shop&addedToCart=true");
    }

    public function empty() {
        Cart::empty();
        header("location:index.php?controller=pages&action=shop");
    }

    public function removeItem() {
        Cart::remove($_GET["productId"]);
        header("location:index.php?controller=cart&action=showCart");
    }

    public function showCart() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Your Cart";

        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/cart.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] = $this->loadView("nav");
        $this->state["content"] .= $this->loadView("cartDisplay");

        $this->state["html"] = $this->loadView("template");
    }

    public function error() {
        $this->state["browserTitle"] = "Error";
        $this->state["errorMsg"] = "Action Not Found";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/error.css'>";

        $this->state["content"] = $this->loadView("error");

        $this->state["html"] = $this->loadView("template");
    }
}

?>