<div class="content account">
    <div class="wrapper">
        <div class="banner">
            <a href="index.php?controller=user&action=account" class="goBack">back to account</a>
            <h1>Your Order</h1>
        </div>
        <div class="banner accountInfo">
            <div class="invoice">
                <?php
                    $invoice = Invoice::getOneInvoice($_GET["invoice"]);
                ?>
                <div class="displayOrder">
                    <div class="orderInfo">
                        <h3>Order <span>#<?=$_GET["invoice"]?></span></h3>
                        <h3>Date: <span><?=$invoice["date"]?></span></h3>
                        <h3>Total: <span>$<?=$invoice["total"]?></span></h3>
                    </div>
                    <h4>Products:</h4>
                    <?php
                        $products = Invoice::invoiceItems($_GET["invoice"]);
                        
                        foreach($products as $product) {
                    ?>
                        <div class="item">
                            <div class="details">
                                <div class="name">
                                    <p><?=$product["productName"]?></p>
                                </div>
                                <div class="qty">
                                    <span>x <?=$product["qty"]?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <?=$this->state["footer"]?>
</div>