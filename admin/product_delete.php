<?php
include("libs/functions.php");
session_start();
confirmLogin();
doQuery("DELETE FROM products WHERE id='".$_GET['id']."'");
header("location: product_list.php?deleted=true")
?>