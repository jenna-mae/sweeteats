<div class="content" id="cart">
    <div class="wrapper">
        <div class="cartPage">
            <div class="cartContents">
                <header>
                    <h1>Your Cart</h1>
                    <?php
                        if(!$_SESSION["cart"]) {
                            Cart::empty();
                            ?>
                            <p class="error">your cart is empty</p>
                            <?php
                        }
                    ?>
                </header>
                <div class="cart">
                    <?php
                        foreach(Cart::getProducts() as $product) {
                    ?>
                        <div class="item">
                            <div class="image">
                                <img src="imgs/<?=$product->image?>" alt="food image">
                            </div>
                            <div class="details">
                                <div class="name">
                                    <h2><?=$product->name?></h2>
                                </div>
                                <div class="price">
                                    <span>$<?=$product->price?></span>
                                </div>
                                <form action="index.php?controller=form&action=itemQuantity" method="post" class="adjustQty spaceLong">
                                    <input type="hidden" name="productId" value="<?=$product->id?>">
                                    <div class="options">
                                        <button class="addBtn sendOK"><i class="fas fa-plus"></i></button>
                                        <input type="number" value="<?=Cart::productQuantity($product->id)?>" name="quantity" class="qtyAmount">
                                        <button class="subtractBtn sendOK"><i class="fas fa-minus"></i></button>
                                    </div>
                                    <div class="remove">
                                        <a href="index.php?controller=cart&action=removeItem&productId=<?=$product->id?>">remove</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php
                if($_SESSION["cart"] != NULL) {
            ?>
            <div class="pricing">
                <div class="priceSummary">
                    <div class="subtotal">
                        <div class="sub priceFlex">
                            <p>Subtotal:</p>
                            <p>$<?=Cart::subTotal()?></p>
                        </div>
                        <div class="shipping priceFlex">
                            <p>Shipping:</p>
                            <p>FREE</p>
                        </div>
                        <div class="tax priceFlex">
                            <p>Taxes:</p>
                            <p>$<?=Cart::taxes()?></p>
                        </div>
                    </div>
                    <div class="total priceFlex">
                        <p>Total:</p>
                        <p>$<?=Cart::total()?></p>
                    </div>
                </div>
                <div class="ctaPrimary">
                    <a href="index.php?controller=cart&action=checkout" class="primary">Checkout</a>
                    <a href="index.php?controller=cart&action=empty" class="empty">Empty Cart</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?=$this->state["footer"]?>
</div>