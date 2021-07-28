<?php
include("libs/functions.php");
session_start();
confirmLogin();
$title = "Orders";
$orderActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="contactList">
    <div class="container">
        <div class="sidebar">
            <?php
                include("snippets/main_nav.php")
            ?>
        </div>

        <div class="wrapper">
            <header>
                <h1>Contact Admin</h1>
            </header>
            <?php
                $_GET["success"] = (isset($_GET["success"])) ? $_GET["success"] : false;
                    if($_GET["success"]) {
                        echo "<div class='success'><p>Contact Saved</p></div>";
                    };

                $_GET["deleted"] = (isset($_GET["deleted"])) ? $_GET["deleted"] : false;
                    if($_GET["deleted"]) {
                        echo "<div class='deleted'><p>Contact Deleted</p></div>";
                    };
            ?>
            <?php
            $_GET["search"] = (isset($_GET["search"])) ? $_GET["search"] : "";
            if(!isset($_GET["search"])) {
                $orders = getAllRecords("SELECT * FROM invoices LEFT JOIN users ON users.id=invoices.usersId ORDER BY invoice_number DESC");
            } else if(is_numeric($_GET["search"])) {
                $orders = getAllRecords("SELECT * FROM invoices LEFT JOIN users ON users.id=invoices.usersId WHERE invoices.invoice_number like '%".$_GET["search"]."%' ORDER BY invoice_number DESC");
            } else {
                $orders = getAllRecords("SELECT * FROM invoices LEFT JOIN users ON users.id=invoices.usersId WHERE users.email like '%".$_GET["search"]."%' ORDER BY invoice_number DESC");
            }
            ?>
            <div class="search">
            <p>Search by invoice number or email</p>
                <form action="order_list.php" method="get">
                    <input type="text" name="search" value="<?=$_GET["search"]?>">
                    <input type="submit" value="go">
                    <a href="order_list.php">clear search</a>
                </form>
            </div>
            <div class="content">

                <div id="labels" class="page">
                    <span>Invoice Number</span>
                    <span>Order Date</span>
                    <span>Customer</span>
                    <span>Status</span>
                    <span class="pageEdits">View Order</span>
                </div>

                <?php
                foreach($orders as $order) {
                    ?>
                    <div class='page'>
                        <span><?=$order['invoice_number']?></span>
                        <span><?=$order['date']?></span>
                        <span><?=$order['email']?></span>
                        <?php
                        if($order['status'] == 0) {
                            ?>
                            <span class="incomplete">Incomplete</span>
                            <?php
                        } else {
                            ?>
                            <span class="complete">Complete</span>
                            <?php
                        }
                        ?>
                        <a href='order_details.php?id=<?=$order['invoice_number']?>' class='edit'>View</a>
                    <?php
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>