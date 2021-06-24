<?php

class Product {
    var $id;
    var $name;
    var $type;
    var $price;
    var $image;
    
    public function __construct($id, $name, $type, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->image = $image;
    }

    static public function get($id) {
        $productDetailsArray = Db::getSingleEntry("SELECT* FROM products WHERE id='".$id."'");

        $product = new Product(
            $productDetailsArray["id"],
            $productDetailsArray["name"],
            $productDetailsArray["typesId"],
            $productDetailsArray["price"],
            $productDetailsArray["image"]
        );
        return $product;
    }

    static public function getBakingDetails($id) {
        $bakingDetails = Db::getSingleEntry("SELECT* FROM products WHERE id='".$id."'");
        return $bakingDetails;
    }

    static public function getCategories($id) {
        $categories = Db::getAllEntries("SELECT cl.id, p.name AS product, c.name FROM categorieslinks cl LEFT JOIN categories c ON c.id=cl.categoriesId LEFT JOIN products p ON p.id=cl.productsId WHERE p.id=".$id);

        $arrCategories = array();
        foreach($categories as $category) {
            $arrCategories[] = $category["name"];
        }
        return $arrCategories;
    }
}

?>