<?php

class PagesController extends Controller {
    public function home() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Home";
        $this->state["homeLinkActive"] = "linkActive";
        $this->state["css"] = "
        <link rel='stylesheet' type='text/css' href='css/main.css'>
        <link rel='stylesheet' type='text/css' href='css/main500.css'>
        <link rel='stylesheet' type='text/css' href='css/main700.css'>
        <link rel='stylesheet' type='text/css' href='css/main900.css'>
        <link rel='stylesheet' type='text/css' href='css/main1200.css'>
        ";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["mainNav"] = $this->loadView("nav");
        $this->state["ctaBanner"] = $this->loadView("ctaBanner");
        $this->state["content"] = $this->loadView("home");
        $this->state["functions"] = "<script>new Scroll();</script>";

        $this->state["html"] = $this->loadView("template");
    }

    public function shop() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Shop";
        $this->state["shopLinkActive"] = "linkActive";

        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/shop.css'>";

        $this->state["types"] = AllProducts::getTypes();
        $this->state["categories"] = AllProducts::getCategories();

        $sortBy = (isset($_POST["sortBy"])) ? $_POST["sortBy"] : "";
        $sortValue = AllProducts::sort($sortBy);

        $filterByType = (isset($_GET["typeId"])) ? $_GET["typeId"] : "";
        $filterByCat = (isset($_GET["catId"])) ? $_GET["catId"] : "";

        $filterValue = AllProducts::filter($filterByType, $filterByCat);

        $this->state["products"] = AllProducts::getAll($filterValue, $sortValue);
        $this->state["footer"] = $this->loadView("footer");
        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] = $this->loadView("nav");
        $this->state["content"] .= $this->loadView("shop");
        $this->state["functions"] = "<script>new Sort(); new Filter(); new PageHeight();</script>";

        $this->state["html"] = $this->loadView("template");
    }

    public function productDetails() {
        $this->state["user"] = User::currentUser();
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/product.css'>";

        $this->state["product"] = Product::get($_GET["productId"]);
        $this->state["categories"] = Product::getCategories($_GET["productId"]);
        $this->state["bakingDetails"] = Product::getBakingDetails($_GET["productId"]);

        $this->state["browserTitle"] = $this->state["product"]->name;
        $this->state["shopLinkActive"] = "linkActive";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] = $this->loadView("nav");
        $this->state["content"] .= $this->loadView("productDetails");
        $this->state["functions"] = "<script>new ProductImages(); new Quantity();</script>";

        $this->state["html"] = $this->loadView("template");
    }

    public function howItWorks() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "How It Works";
        $this->state["worksLinkActive"] = "linkActive";

        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/content.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] = $this->loadView("nav");
        $this->state["ctaBanner"] = $this->loadView("ctaBanner");
        $this->state["content"] .= $this->loadView("howItWorks");
        $this->state["functions"] = "";

        $this->state["html"] = $this->loadView("template");
    }

    public function about() {
        $this->state["user"] = User::currentUser();
        $this->state["browserTitle"] = "Welcome to VanArts";
        $this->state["aboutLinkActive"] = "linkActive";

        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/content.css'>";

        $this->state["footer"] = $this->loadView("footer");
        $this->state["content"] = $this->loadView("nav");
        $this->state["ctaBanner"] = $this->loadView("ctaBanner");
        $this->state["content"] .= $this->loadView("about");
        $this->state["functions"] = "";

        $this->state["html"] = $this->loadView("template");
    }

    public function error() {
        $this->state["browserTitle"] = "Error";
        $this->state["errorMsg"] = "Action Not Found";
        $this->state["css"] = "<link rel='stylesheet' type='text/css' href='css/error.css'>";
        $this->state["functions"] = "";
        
        $this->state["content"] = $this->loadView("error");

        $this->state["html"] = $this->loadView("template");
    }
}