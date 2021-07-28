<?php
session_start();
include("libs/functions.php");
$username = $_POST["username"];
$password = $_POST["password"];
$login = getSingleRecord("SELECT * FROM admin_users WHERE username='".$username."' AND password='".$password."'");

if($login) {
    $_SESSION["id"] = $login["id"];
    header("location: dashboard.php");
} else {
    unset($_SESSION["id"]);
    header("location: index.php?error=true");
}
?>