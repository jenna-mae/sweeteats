<?php
include("libs/functions.php");
session_start();
confirmLogin();

$typeId = $_POST["id"];
$typeName = $_POST["name"];


if($typeId != "") {
    doQuery("UPDATE types set name='".$typeName."' WHERE id=".$typeId);
} else {
    doQuery("INSERT INTO types (name) VALUES ('".$typeName."')");
}

header("location: type_list.php");

?>