<div class="content account manageAccount">
    <div class="wrapper">
        <div class="userForm">
            <a href="index.php?controller=user&action=account" class="back">back to account</a>
            <form action="index.php?controller=form&action=updateUser" method="post">
                <h1>Manage Account</h1>
                <div class="fieldsets">
                    <input type="hidden" name="id" value="<?=$this->state["user"]["id"]?>">
                    <div class="fieldset half">
                        <input type="text" name="firstName" placeholder="First Name" value="<?=$this->state["user"]["firstName"]?>">
                    </div>
                    <div class="fieldset half">
                        <input type="text" name="lastName" placeholder="Last Name" value="<?=$this->state["user"]["lastName"]?>">
                    </div>
                    <div class="fieldset full">
                        <input type="email" name="email" placeholder="Email Address" value="<?=$this->state["user"]["email"]?>">
                    </div>
                    <div class="fieldset full">
                        <input type="text" name="company" placeholder="Company (optional)" value="<?=$this->state["user"]["company"]?>">
                    </div>
                    <div class="fieldset full">
                        <input type="text" name="address" placeholder="Address" value="<?=$this->state["user"]["address"]?>">
                    </div>
                    <div class="fieldset full">
                        <input type="text" name="suite" placeholder="Apartment, suite, etc. (optional)"  value="<?=$this->state["user"]["suite"]?>">
                    </div>
                    <div class="fieldset half">
                        <input type="text" name="city" placeholder="City"  value="<?=$this->state["user"]["city"]?>">
                    </div>
                    <div class="fieldset half">
                        <input type="text" name="postal" placeholder="Postal Code" value="<?=$this->state["user"]["postal"]?>">
                    </div>
                    <div class="fieldset half">
                        <select name="province">
                            <option name="province" value="BC" selected>BC</option>
                        </select>
                    </div>
                    <div class="fieldset half">
                        <select name="country">
                            <option name="canada" value="Canada" selected>Canada</option>
                        </select>
                    </div>
                    <div class="fieldset half">
                        <?php
                            $categories = AllProducts::getCategories();
                        ?>
                        <select name="diet">
                        <option name="" value="">Choose One</option>
                            <?php
                                foreach($categories as $category){
                                $isSelected = ($this->state["user"]["dietPrimary"] == $category["id"]) ? 'selected' : '';
                            ?>
                            <option value="<?=$category["id"]?>" <?=$isSelected?>><?=$category["name"]?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="submit ctaPrimary">
                        <input type="submit" value="Save Changes" class="primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?=$this->state["footer"]?>
</div>