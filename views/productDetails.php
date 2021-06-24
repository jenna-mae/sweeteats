<div class="content">
    <div class="productDetails">
        <div class="wrapper displayProduct">
            <div class="productInformation">
                <div class="left">
                    <div class="images">
                        <div class="image-lrg">
                            <img src="imgs/<?=$this->state["product"]->image?>" alt="">
                        </div>
                        <div class="imgs-sm">
                            <a href="#" class="productThumbnail"><img src="imgs/<?=$this->state["bakingDetails"]["image"]?>" alt=""></a>
                            <a href="#" class="productThumbnail"><img src="imgs/<?=$this->state["bakingDetails"]["image_sec"]?>" alt=""></a>
                            <a href="#" class="productThumbnail"><img src="imgs/<?=$this->state["bakingDetails"]["image_tert"]?>" alt=""></a>
                            <a href="#" class="productThumbnail"><img src="imgs/<?=$this->state["bakingDetails"]["image_quat"]?>" alt=""></a>
                        </div>
                    </div>
                    <div class="about hide-sm">
                        <h3>About the Recipe</h3>
                        <p><?=$this->state["bakingDetails"]["details"]?></p>
                    </div>
                </div>
                <div class="right">
                    <div class="title">
                        <div class="titleLabels">
                            <h1><?=$this->state["product"]->name?></h1>
                            <?php
                                foreach($this->state["categories"] as $category){
                                ?>
                                    <p class="category"><?=$category?><span> | </span></p>
                                <?php
                                }
                            ?>
                        </div>
                        <div class="titlePrice">
                            <p>$ <?=$this->state["product"]->price?></p>
                        </div>
                    </div>
                    <div class="quantity bar">
                        <form action="index.php?controller=form&action=cartQuantity" method="post" class="adjustQty  spaceLong">
                            <input type="hidden" name="productId" value="<?=$this->state["product"]->id?>">
                            <span class="flex">QTY</span>
                            <div class="options flex">
                                <button class="addBtn"><i class="fas fa-plus"></i></button>
                                <input type="number" value="" name="quantity" class="qtyAmount">
                                <button class="subtractBtn"><i class="fas fa-minus"></i></button>
                            </div>
                            <div class="ctaPrimary">
                                <input type="submit" class="primary" value="add to cart">
                            </div>
                        </form>
                    </div>
                    <div class="details bar spaceLong">
                        <div class="servings">
                            <p>servings:</p><span><?=$this->state["bakingDetails"]["servings"]?></span>
                        </div>
                        <div class="prep">
                            <p>prep time:</p><span><?=$this->state["bakingDetails"]["prepTime"]?></span>
                        </div>
                        <div class="bake">
                            <p>bake time:</p><span><?=$this->state["bakingDetails"]["bakeTime"]?></span>
                        </div>
                    </div>
                    <div class="bar ingredientWrapper">
                        <div class="highlightBox">
                            <div class="ingredients">
                                <div class="ingredientDetails">
                                    <div class="included">
                                        <p class="heading">Included:</p>
                                        <ul>
                                            <li> 
                                            <?php
                                                $records = $this->state["bakingDetails"]["included"];
                                                $list = str_replace(",", "</li><li> ", $records);
                                                echo $list;
                                            ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="notIncluded">
                                        <p class="heading">From Your Pantry:</p>
                                        <ul>
                                            <li> 
                                            <?php
                                                $records = $this->state["bakingDetails"]["notIncluded"];
                                                $list = str_replace(",", "</li><li> ", $records);
                                                echo $list;
                                            ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tools">
                                    <p class="heading">Tools You'll Need:</p>
                                    <ul>
                                        <li> 
                                        <?php
                                            $records = $this->state["bakingDetails"]["tools"];
                                            $list = str_replace(",", "</li><li> ", $records);
                                            echo $list;
                                        ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about hide-l">
                    <h3>About the Recipe</h3>
                    <p><?=$this->state["bakingDetails"]["details"]?></p>
                </div>
            </div>
            <div class="moreInfo">
                <div class="quality">
                    <h4>100% Organic</h4>
                    <p>Each recipe is thoughtfully planned and prepared with quality ingredients at an affordable cost, for a delicious home-cooked meal, made by you. Get quality ingredients to make world-class recipes delivered weekly to your door. </p>
                </div>
                <div class="shipping">
                    <h4>Shipping</h4>
                    <p>All baking kits are shipped to arrive guaranteed fresh. We partner with Periship, the leader in food shipping. PeriShip utilizes a wide array of capabilities ensuring your perishables arrives in peak condition.</p>
                </div>
            </div>
        </div>
    </div>
    <?=$this->state["footer"]?>
</div>