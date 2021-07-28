<?php
include("libs/functions.php");
session_start();
confirmLogin();

$title = "Order Details";
$orderActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="contactForm">
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

            <div class="content">
                <?php
                    $invoice = getSingleRecord("SELECT invoices.id AS invoiceId, invoices.invoice_number, invoices.date, invoices.total, invoices.status, users.* FROM invoices LEFT JOIN users ON invoices.usersId=users.id WHERE invoice_number='".$_GET["id"]."'");
                    if(isset($_GET["id"])) {
                        $results = getAllRecords("SELECT * FROM invoice_items WHERE invoice_number='".$_GET["id"]."'");
                    }
                ?>

                <div class="entryForm">
                    <div class="invoiceDetails">
                        <h2>Invoice Details</h2>
                        <div class="details">
                            <p>Invoice# <?=$invoice["invoice_number"]?></p>
                            <p>Date: <?=$invoice["date"]?></p>
                            <p>Total: <?=$invoice["total"]?></p>
                            <span>Status:</span>
                            <?php
                                if($invoice["status"] == 1) {
                                    ?>
                                    <span class="complete">Complete</span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="incomplete">Incomplete</span>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="customerDetails">
                        <h2>Customer Details</h2>
                        <div class="details">
                            <p>Customer: <?=$invoice["firstName"]?> <?=$invoice["lastName"]?></p>
                            <p>Email: <?=$invoice["email"]?></p>
                            <p>Address: <?=$invoice["address"]?>, <?=$invoice["city"]?> <?=$invoice["province"]?>, <?=$invoice["postal"]?></p>
                        </div>
                    </div>
                    
                    <div class="products">
                        <h2>Products</h2>
                        <div class="details">
                            <?php
                            foreach($results as $result) {
                                ?>
                                <div class="orderItem">
                                    <p><?=$result["productName"]?></p>
                                    <p>x <?=$result["qty"]?></p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <form method="post" action="order_save.php">
                            <input type="hidden" name="id" value="<?=$invoice['invoiceId']?>">
                            <input type="hidden" name="status" value="<?=$invoice['status']?>">
                            <div class="buttonField">
                                <?php
                                    if($invoice["status"] == 0) {
                                        ?>
                                        <input type="submit" value="Mark As Complete"/>
                                    <?php
                                    } else {
                                        ?>
                                        <input type="submit" value="Mark As Incomplete"/>
                                        <?php
                                    }
                                ?>
                                
                                <a href="order_list.php">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>