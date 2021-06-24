<div class="content">
    <div class="checkout">
        <div class="orderSummary">
            <div class="wrapper">
                <p class="yourOrder">Your Order: $<?=Cart::total()?></p>
                <div class="displayOrder">
                    <?php
                        foreach(Cart::getProducts() as $product) {
                    ?>
                        <div class="item">
                            <div class="image">
                                <img src="imgs/<?=$product->image?>" alt="food image">
                                <span><?=Cart::productQuantity($product->id)?></span>
                            </div>
                            <div class="details">
                                <div class="name">
                                    <p><?=$product->name?></p>
                                </div>
                                <div class="price">
                                    <span>$<?=$product->price?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
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
                </div>
            </div>
        </div>
        <div class="wrapper contactInfo">
            <h1>Complete Checkout</h1>
            <form action="index.php?controller=form&action=checkout" class="checkoutForm requiredForm validatePassword" method="post">
                <?php
                $user = $this->state["user"];
                ?>
                <header class="checkoutStep">
                    <h2 class="noPadding">Step 1: Create An Account</h2>
                    <?php
                        if($user["id"] == NULL) {
                            ?>
                            <p>Already have an account? <a href="index.php?controller=User&action=login&checkout=1">Log In</a></p>
                            <div class="makeAccount">
                                <input type="hidden" value="" name="id">
                                <div class="fieldset full">
                                    <div class="errorMsg">
                                        <span>* Required Field</span>
                                    </div>
                                    <input type="email" name="email" placeholder="Email Address" value="<?=$user["email"]?>" class="required">
                                </div>
                                <div class="fieldset half">
                                    <div class="errorMsg">
                                        <span>* Required Field</span>
                                    </div>
                                    <input type="password" name="password" placeholder="Password" value="" class="required password">
                                </div>
                                <div class="fieldset half">
                                    <div class="errorMsg">
                                        <span>* Required Field</span>
                                    </div>
                                    <input type="password" placeholder="Confirm Password" value="" class="required confirmPassword">
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <input type="hidden" value="<?=$user["id"]?>" name="id">
                            <div class="fieldset">
                                <div class="errorMsg">
                                    <span>* Required Field</span>
                                </div>
                                <input type="email" name="email" placeholder="Email Address" value="<?=$user["email"]?>" class="required">
                            </div>
                            <?php
                        }
                    ?>
                </header>
                <div class="shipping checkoutStep">
                    <h2>Step 2: Enter Your Shipping Information</h2>
                    <div class="fieldset half">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" name="firstName" placeholder="First Name" value="<?=$user["firstName"]?>" class="required">
                    </div>
                    <div class="fieldset half">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" name="lastName" placeholder="Last Name" value="<?=$user["lastName"]?>" class="required">
                    </div>
                    <div class="fieldset full">
                        <input type="text" name="company" placeholder="Company (optional)" value="<?=$user["company"]?>">
                    </div>
                    <div class="fieldset full">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" name="address" placeholder="Address" value="<?=$user["address"]?>" class="required">
                    </div>
                    <div class="fieldset half">
                        <input type="text" name="suite" placeholder="Apartment, suite, etc. (optional)"  value="<?=$user["suite"]?>">
                    </div>
                    <div class="fieldset half">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" name="city" placeholder="City"  value="<?=$user["city"]?>" class="required">
                    </div>
                    <div class="fieldset third">
                        <select name="province">
                            <option value="BC" selected>BC</option>
                        </select>
                    </div>
                    <div class="fieldset third">
                        <select name="country">
                            <option value="Canada" selected>Canada</option>
                        </select>
                    </div>
                    <div class="fieldset third">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" name="postal" placeholder="Postal Code" value="<?=$user["postal"]?>" class="required">
                    </div>
                </div>
                <div class="payment checkoutStep">
                    <h2>Step 3: Enter Your Payment Information</h2>
                    <div class="fieldset full">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" placeholder="Card Number" class="required">
                    </div>
                    <div class="fieldset half">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" placeholder="Name On Card" class="required">
                    </div>
                    <div class="fieldset quarter">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" placeholder="MM/YY" class="required">
                    </div>
                    <div class="fieldset quarter">
                        <div class="errorMsg">
                            <span>* Required Field</span>
                        </div>
                        <input type="text" placeholder="CVV" class="required">
                    </div>
                </div>
                <input type="submit" value="Complete Purchase" class="primary half submitForm">
                <div class="returnToCart">
                    <a href="index.php?controller=cart&action=showCart">return to cart</a>
                </div>
            </form>
        </div>
    </div>
    <?=$this->state["footer"]?>
</div>