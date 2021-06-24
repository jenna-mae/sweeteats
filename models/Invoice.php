<?php

class Invoice {

    static public function invoiceItems($invoiceNumber) {
        $results = Db::getAllEntries("SELECT * FROM invoice_items LEFT JOIN products ON invoice_items.productId=products.id WHERE invoice_number='".$invoiceNumber."'");
        return $results;
    }

    static public function getOneInvoice($invoiceNumber) {
        $result = Db::getSingleEntry("SELECT * FROM invoices WHERE invoice_number=".$invoiceNumber);
        return $result;
    }

    static public function recordInvoiceItem($invoiceNumber) {
        foreach($_SESSION["cart"] as $cartItemId=>$qty) {
            $product = Product::get($cartItemId);
            Db::doQuery("INSERT INTO invoice_items (invoice_number, productId, productName, productPrice, qty) VALUES ('".$invoiceNumber."', '".$product->id."', '".$product->name."', '".$product->price."', '".$qty."')");
        }
    }

    static public function invoiceEntry($invoiceNumber) {
        $date = Invoice::getDate();
        $total = Cart::total();
        $usersId = $_SESSION["id"];
        $invoice = Db::doQuery("INSERT INTO invoices (invoice_number, date, total, usersId) VALUES ('".$invoiceNumber."', '".$date."', '".$total."', '".$usersId."')");
    }

    static public function getDate() {
        date_default_timezone_set('America/Vancouver');
        $date = date("Y-m-d");
        return $date;
    }

    static public function generateInvoiceNumber() {
        $invoiceNumber = 1000;
        $result = Db::getSingleEntry("SELECT MAX(id) FROM invoices");
        $lastNumber = array_values($result);

        $newId = $lastNumber[0] +1;

        $invoiceNumber = $invoiceNumber + $newId;
        
        return $invoiceNumber;
    }
}

?>