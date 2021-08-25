<?php

class User {

    static public function recommendedProducts($id) {
        $products = Db::getAllEntries("SELECT c.id AS catID, p.*, c.name FROM categorieslinks cl LEFT JOIN categories c ON c.id=cl.categoriesId LEFT JOIN products p ON p.id=cl.productsId WHERE c.id = '".$id."' LIMIT 5");
        $productsArray = array();
        foreach($products as $product) {
            $product = Product::get($product["id"]);
            $productsArray[] = $product;
        }
        return($productsArray);
    }

    static public function getDiet() {
        $dietPrimary = Db::getSingleEntry("SELECT categories.id, categories.name FROM users LEFT JOIN categories ON users.dietPrimary = categories.id WHERE users.id='".$_SESSION["id"]."'");
        return $dietPrimary;
    }

    static public function recentlyOrdered() {
        $products = Db::getAllEntries("SELECT invoice_items.productId FROM invoices LEFT JOIN users on invoices.usersId=users.id LEFT JOIN invoice_items on invoices.invoice_number=invoice_items.invoice_number WHERE users.id=".$_SESSION["id"]);
        $productsArray = array();
        foreach($products as $productId) {
            $product = Product::get($productId["productId"]);
            $productsArray[] = $product;
        }
        return($productsArray);
    }

    static public function orderHistory() {
        $orders = Db::getAllEntries("SELECT * FROM invoices WHERE usersId=".$_SESSION["id"]);
        return $orders;
    }

    static public function accountInfo($id, $email, $password, $encPass, $firstName, $lastName, $company, $address, $suite, $city, $province, $country, $postal, $diet) {
        if($id == "") {
            Db::doQuery("INSERT INTO users (email, firstname, lastname, password, company, address, suite, city, province, country, postal) VALUES ('".$email."', '".$firstName."', '".$lastName."', '".$encPass."', '".$company."', '".$address."', '".$suite."', '".$city."', '".$province."', '".$country."', '".$postal."')");
            User::doLogin($email, $password);
        } else {
            Db::doQuery("UPDATE users SET email='".$email."', firstName='".$firstName."', lastName='".$lastName."', company='".$company."', address='".$address."', suite='".$suite."', city='".$city."', province='".$province."', country='".$country."', postal='".$postal."', dietPrimary='".$diet."' WHERE id='".$id."'");
        }
    }
    
    static public function doLogout() {
        unset($_SESSION["id"]);
    }

    static public function doLogin($email, $password) {
        $con = Db::connect();
        $user = Db::getSingleEntry("SELECT * FROM users WHERE email='".mysqli_real_escape_string($con, $email)."'");
        if($user) {
            $encPass= $user["password"];
            $providedPass = $password;
            if(password_verify($providedPass, $encPass)) {
                $_SESSION["id"] = $user["id"];
                return $_SESSION["id"];
            } else {
                header("location: index.php?controller=pages&action=error");
            }
        } else {
            header("location: index.php?controller=pages&action=error");
        }
    }

    static public function register($firstName, $lastName, $email, $password) {
        Db::doQuery("INSERT INTO users (firstname, lastname, email, password) VALUES ('".$firstName."', '".$lastName."','".$email."', '".$password."')");
        $user = Db::getSingleEntry("SELECT * FROM users WHERE email='".$email."'");
        if($user) {
            $_SESSION["id"] = $user["id"];
            return $_SESSION["id"];
        } else {
            header("location: index.php?controller=pages&action=error");
        }
    }

    static function currentUser() {
        $userDetails = array();
        $_SESSION["id"] = (isset($_SESSION["id"])) ? $_SESSION["id"] : "";
        $user = Db::getSingleEntry("SELECT users.* FROM users WHERE users.id='".$_SESSION["id"]."'");
        if($user) {
            return $user;
        } else {
            $userDetails["id"] = "";
            $userDetails["email"] = "";
            $userDetails["firstName"] = "";
            $userDetails["lastName"] = "";
            $userDetails["company"] = "";
            $userDetails["address"] = "";
            $userDetails["suite"] = "";
            $userDetails["city"] = "";
            $userDetails["province"] = "";
            $userDetails["country"] = "";
            $userDetails["postal"] = "";
            $userDetails["dietPrimary"] = "";
            return $userDetails;
        }
    }
}

?>