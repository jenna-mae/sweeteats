<?php
include("libs/functions.php");
session_start();
confirmLogin();

$invoiceId = $_POST["id"];
$status = $_POST["status"];

if($status == 0) {
    doQuery("UPDATE invoices set status=1 WHERE id=".$invoiceId);
} else {
    doQuery("UPDATE invoices set status=0 WHERE id=".$invoiceId);
}

header("location: order_list.php");

?>