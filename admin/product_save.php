<?php
include("libs/functions.php");
session_start();
confirmLogin();

move_uploaded_file($_FILES["newImage1"]["tmp_name"], "assets/".$_FILES["newImage1"]["name"]);
move_uploaded_file($_FILES["newImage2"]["tmp_name"], "assets/".$_FILES["newImage2"]["name"]);
move_uploaded_file($_FILES["newImage3"]["tmp_name"], "assets/".$_FILES["newImage3"]["name"]);
move_uploaded_file($_FILES["newImage4"]["tmp_name"], "assets/".$_FILES["newImage4"]["name"]);

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$type = $_POST["typesId"];


$image1 = $_FILES["newImage1"]["name"];
if($image1=="") {
    if($_POST["currentImage1"]) {
        $image1 = $_POST["currentImage1"];
    }
}

$image2 = $_FILES["newImage2"]["name"];
if($image2=="") {
    if($_POST["currentImage2"]) {
        $image2 = $_POST["currentImage2"];
    }
}

$image3 = $_FILES["newImage3"]["name"];
if($image3=="") {
    if($_POST["currentImage3"]) {
        $image3 = $_POST["currentImage3"];
    }
}

$image4 = $_FILES["newImage4"]["name"];
if($image4=="") {
    if($_POST["currentImage4"]) {
        $image4 = $_POST["currentImage4"];
    }
}


$servings = $_POST["servings"];
$prep = $_POST["prep"];
$bake = $_POST["bake"];
$included = $_POST["included"];
$notIncluded = $_POST["notIncluded"];
$tools = $_POST["tools"];
$details = $_POST["details"];

$con = connect();
if (!$id) {
    doQuery("INSERT INTO products (name, typesId, price, image, image_sec, image_tert, image_quat, servings, prepTime, bakeTime, included, notIncluded, tools, details) VALUES ('".$name."', '".$type."', '".$price."', '".$image1."', '".$image2."', '".$image3."', '".$image4."', '".$servings."', '".$prep."', '".$bake."', '".$included."', '".$notIncluded."', '".$tools."', '".$details."')");
} else {
    doQuery("UPDATE products SET name='".$name."', typesId='".$type."', price='".$price."', image='".$image1."', image_sec='".$image2."', image_tert='".$image3."', image_quat='".$image4."', servings='".$servings."', prepTime='".$prep."', bakeTime='".$bake."', included='".$included."', notIncluded='".$notIncluded."', tools='".$tools."', details='".mysqli_real_escape_string($con, $details)."' WHERE id='".$id."'");
}

header("location: product_list.php?success=true")

?>