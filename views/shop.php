<div class="content" id="shop">
    <div class="wrapper">
        <header>
            <?php
                if(isset($_GET["addedToCart"])) {
                    ?>
                        <div class="success">
                            <p>Product added to your cart!</p>
                        </div>
                    <?php
                }
            ?>
            <h1>Shop Baking Kits</h1>
        </header>
        <div class="gridContainer">
            <div class="filter">
                <h2>Filters</h2>
                <a href="#" class="filterBtn">Filters</a>
                <div class="filterOptions">
                    <ul class="firstFilter filterOption">
                        <a href="index.php?controller=pages&action=shop" class="clear">clear filters</a>
                        <h3>Type</h3>
                        
                        <?php
                            foreach($this->state["types"] as $type) {
                                $_GET["typeId"] = (isset($_GET["typeId"])) ? $_GET["typeId"] : "";
                                $activeFilter = ($type["id"] == $_GET["typeId"]) ? "active" : "";
                                ?>
                                <li><a href="index.php?controller=pages&action=shop&typeId=<?=$type["id"]?>" class="<?=$activeFilter?>"><?=$type["name"]?></a></li>
                                <?php
                            }
                        ?>
                    </ul>
                    <ul class="secondFilter filterOption">
                        <h3>Dietary Needs</h3>
                        <?php
                            foreach($this->state["categories"] as $category) {
                                $_GET["catId"] = (isset($_GET["catId"])) ? $_GET["catId"] : "";
                                $activeFilter = ($category["id"] == $_GET["catId"]) ? "active" : "";
                                ?>
                                <li><a href="index.php?controller=pages&action=shop&catId=<?=$category["id"]?>" class="<?=$activeFilter?>"><?=$category["name"]?></a></li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="sort">
                <h2>Sort</h2>
                <?php
                    if(isset($_GET["typeId"])) {
                        $filter = "&typeId=".$_GET["typeId"];
                    } else if(isset($_GET["catId"])){
                        $filter = "&catId=".$_GET["catId"];
                    } else {
                        $filter = "";
                    }
                ?>
                <form action="index.php?controller=pages&action=shop<?=$filter?>" method="post" id="sortForm">
                    <select name="sortBy" id="sort">
                    <?php
                        $sortOptions = AllProducts::sortOptions();
                        foreach($sortOptions as $value=>$option) {
                            $selected = ($value == $_POST["sortBy"]) ? "selected" : "";
                            ?>
                            <option value="<?=$value?>" <?=$selected?>><?=$option?></option>
                            <?php
                        }
                    ?>
                    </select>
                </form>
            </div>
            <div class="products" id="allProducts">
                
                <?php
                    foreach($this->state["products"] as $product) {
                ?>
                <div class="product">
                    <div class="productWrapper">
                        <div class="productImage">
                            <img src="imgs/<?=$product->image?>" alt="Sweeteats Dessert">
                            <a href="index.php?controller=pages&action=productDetails&productId=<?=$product->id?>" class="gotoItem"></a>
                        </div>
                        <div class="productDetails">
                            <div class="productFlex">
                                <div class="productLabels">
                                    <h1><a href="index.php?controller=pages&action=productDetails&productId=<?=$product->id?>"><?=$product->name?></a></h1>
                                    <p class="categories">
                                    <?php
                                        foreach(Product::getCategories($product->id) as $category){
                                            ?>
                                            <?=$category?> <span> | </span>
                                            <?php
                                        }
                                    ?>
                                    </p>
                                </div>
                                <div class="productPrice">
                                    <span class="price">$<?=$product->price?></span>
                                </div>
                            </div>
                            <div class="addToCart">
                                <a href="index.php?controller=cart&action=add&productId=<?=$product->id?>" class="cartAdd hide-sm">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="productGhost"></div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?=$this->state["footer"]?>
</div>