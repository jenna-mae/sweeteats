<div class="content account">
    <div class="wrapper">
        <div class="banner">
            <h1>My Account</h1>
            <?php
                if(isset($_GET["checkout"])){
                    ?>
                    <div class="checkoutSuccess">
                        <p>Your order has been placed</p>
                    </div>
                    <?php
                } else if(isset($_GET["updated"])) {
                    ?>
                    <div class="checkoutSuccess">
                        <p>Your account has been updated</p>
                    </div>
                    <?php
                }
            ?>
            <h2>Welcome back, <?=$this->state["user"]["firstName"]?></h2>
        </div>
        <div class="banner accountInfo">
            <div class="orderHistory">
                <h3>Order History</h3>
                <div class="orders">
                    <?php
                        $orders = User::orderHistory();
                        if($orders) {
                            foreach($orders as $order) {
                                ?>
                                <div class="order">
                                    <p><?=$order["invoice_number"]?><span>-</span></p>
                                    <p><?=$order["date"]?><span>-</span></p>
                                    <p>$<?=$order["total"]?></p>
                                    <a href="index.php?controller=user&action=viewInvoice&invoice=<?=$order["invoice_number"]?>">View Order</a>
                                </div>
                                <?php
                            }
                        } else {
                            echo"<p>You havent placed any orders yet.</p>";
                        }
                    ?>
                </div>
            </div>
            <div class="details">
                <h3>Account Details</h3>
                <p><?=$this->state["user"]["firstName"]," ". $this->state["user"]["lastName"]?></p>
                <p><?=$this->state["user"]["email"]?></p>
                <p>Address:</br><?=$this->state["user"]["address"]?></br><?=$this->state["user"]["city"]?> <?=$this->state["user"]["province"]?> <?=$this->state["user"]["postal"]?></p>
                <div class="ctaSecondary">
                    <a href="index.php?controller=user&action=manageAccount" class="secondary">Manage Account</a>
                </div>
            </div>
        </div>
        <div class="banner">
            <h3>Recommended For You</h3>
            <?php
                $dietValue = User::getDiet();
            ?>
            <?php
                if($dietValue["id"] != NULL) {
                    ?>
                    <h4>Based On Your Dietary Preference: <span><?=$dietValue["name"]?></span></h4>
                    <div class="recents">
                        <?php
                            $results = User::recommendedProducts($dietValue["id"]);
                            foreach($results as $result) {
                        ?>
                        <div class="recent">
                            <a href="index.php?controller=pages&action=productDetails&productId=<?=$result->id?>"><img src="imgs/<?=$result->image?>" alt="sweeteats product"></a>
                            <p><?=$result->name?></p>
                        </div>
                    <?php
                    }
                    ?>
                        </div>
                    <?php
                } else {
                    echo"<p>You do not have dietary preferences set. Go to 'manage account' to set them.</p>";
                }
                ?>
        </div>
        <div class="banner">
            <h3>Recently Ordered Items</h3>
            <div class="recents">
                <?php
                $products = User::recentlyOrdered();
                if($products) {
                    foreach($products as $product) {
                        ?>
                        <div class="recent">
                            <a href="index.php?controller=pages&action=productDetails&productId=<?=$product->id?>"><img src="imgs/<?=$product->image?>" alt="sweeteats product"></a>
                            <p><?=$product->name?></p>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <p>You haven't placed any orders yet.</p>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="logout">
            <a href="index.php?controller=user&action=logout">logout</a>
        </div>
    </div>
    <?=$this->state["footer"]?>
</div>