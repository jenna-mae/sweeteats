<?php

class AllProducts {
    static public function getAll($filterBy, $sortBy) {
        if($filterBy != "") {
            $products = Db::getAllEntries("SELECT products.*, types.name AS type, categories.name AS category, categories.id AS catId FROM products LEFT JOIN types ON products.typesId=types.id LEFT JOIN categorieslinks ON products.id=categorieslinks.productsId LEFT JOIN categories ON categorieslinks.categoriesId=categories.id ".$filterBy." ".$sortBy);
        } else {
            $products = Db::getAllEntries("SELECT products.*, types.name AS type, categories.name AS category, categories.id AS catId FROM products LEFT JOIN types ON products.typesId=types.id LEFT JOIN categorieslinks ON products.id=categorieslinks.productsId LEFT JOIN categories ON categorieslinks.categoriesId=categories.id GROUP BY products.name ".$sortBy);
        }
        return AllProducts::productsFactory($products);
    }

    static public function productsFactory($products) {
        foreach($products as &$product) {
            $product = new Product (
                $product["id"],
                $product["name"],
                $product["type"],
                $product["price"],
                $product["image"]
        );
        }
        return $products;
    }

    static public function filter($typeValue, $catValue) {
        if($typeValue != "") {
            $filter = "GROUP BY products.name HAVING products.typesId=".$typeValue;
        } else if($catValue != "") {
            $filter = "HAVING categories.id=".$catValue;
        } else {
            $filter = "";
        }
        return $filter;
    }

    static public function sortOptions() {
        $sortArray = [
            "az" => "A-Z",
            "za" => "Z-A",
            "lh" => "$ Low-High",
            "hl" => "$ High-Low"
        ];

        return $sortArray;
    }

    static public function sort($value) {
        if($value == "az") {
            $sort = "ORDER BY products.name ASC";
        } else if($value == "za") {
            $sort = "ORDER BY products.name DESC";
        } else if($value == "lh") {
            $sort = "ORDER BY products.price ASC";
        } else if($value == "hl") {
            $sort = "ORDER BY products.price DESC";
        } else {
            $sort = "ORDER BY products.name ASC";
        }
        return $sort;
    }

    static public function getTypes() {
        $results = Db::getAllEntries("SELECT * FROM types");
        return $results;
    }

    static public function getCategories() {
        $results = Db::getAllEntries("SELECT * FROM categories");
        return $results;
    }
}

?>