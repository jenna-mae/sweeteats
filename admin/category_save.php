<?php
include("libs/functions.php");
session_start();
confirmLogin();

$catId = $_POST["id"];
$catName = $_POST["name"];


if($catId != "") {
    $arrOfItems = $_POST["itemIds"];
    doQuery("DELETE FROM categorieslinks WHERE categoriesId='".$catId."'");
    foreach($arrOfItems as $item) {
        doQuery("INSERT INTO categorieslinks (productsId, categoriesId) VALUES (".$item.", ".$catId.")");
    }
} else {
    doQuery("INSERT INTO categories (name) VALUES ('".$catName."')");
}

header("location: category_list.php")

?>