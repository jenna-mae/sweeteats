<?php
include("libs/functions.php");
session_start();
confirmLogin();

$title = "Edit Product";
$productActive= "active";
$sitecontentActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="pageForm">
    <div class="container">
        <div class="sidebar">
            <?php
                include("snippets/main_nav.php")
            ?>
        </div>
        <div class="wrapper">
            <header>
                <h1>Page Admin</h1>
                <?php
                    include("snippets/pages_nav.php")
                ?>
            </header>

            <div class="content">
                <?php
                    $retrieveData['id']="";
                    $retrieveData['name']="";
                    $retrieveData['typesId']="";
                    $retrieveData['price']="";
                    $retrieveData['image']="";
                    $retrieveData['image_sec']="";
                    $retrieveData['image_tert']="";
                    $retrieveData['image_quat']="";
                    $retrieveData['servings']="";
                    $retrieveData['prepTime']="";
                    $retrieveData['bakeTime']="";
                    $retrieveData['included']="";
                    $retrieveData['notIncluded']="";
                    $retrieveData['tools']="";
                    $retrieveData['details']="";
                    if(isset($_GET["id"])) {
                        $retrieveData = getSingleRecord("SELECT products.*, categorieslinks.categoriesId FROM products LEFT JOIN categorieslinks on products.id=categorieslinks.productsId WHERE products.id='".$_GET["id"]."'");
                    }
                ?>

                <div class="entryForm">
                    <form method="post" action="product_save.php" enctype="multipart/form-data">
                        <div id="smallFieldsets">
                            <input type="hidden" name="id" value="<?=$retrieveData['id']?>" readonly class="readonly">

                            <div class="fieldset smallField">
                                <label>Product Name</label>
                                <input type="text" name="name" value="<?=$retrieveData['name']?>">
                            </div>

                            <div class="fieldset smallField">
                                <label>Price</label>
                                <input type="number" name="price" value="<?=$retrieveData['price']?>">
                            </div>

                            <div class="fieldset smallField">
                                <label>Type</label>
                                <?=makeDropDown("SELECT * FROM types ORDER BY name ASC", $retrieveData['typesId'], "typesId" )?>
                            </div>
                        </div>

                        <div class="fieldset">
                            <label>Product Image 1</label>
                            <div class="imagePreview">
                                <div class="showImage">
                                    <?php
                                        if($retrieveData["image"]) {
                                            echo "<img src='assets/".$retrieveData['image']."'/>
                                            <button id='deleteImage'>Delete Photo</button>";
                                        }
                                    ?>
                                </div>
                                <div class="imageLabels">
                                    <label>Current Image File</label>
                                    <input type="text" id="currentImage1" name="currentImage1" value="<?=$retrieveData['image']?>">
                                    <label>Choose a New File</label>
                                    <input type="file" name="newImage1">
                                </div>
                            </div>
                        </div>

                        <div class="fieldset">
                            <label>Product Image 2</label>
                            <div class="imagePreview">
                                <div class="showImage">
                                    <?php
                                        if($retrieveData["image_sec"]) {
                                            echo "<img src='assets/".$retrieveData['image_sec']."'/>
                                            <button id='deleteImage'>Delete Photo</button>";
                                        }
                                    ?>
                                </div>
                                <div class="imageLabels">
                                    <label>Current Image File</label>
                                    <input type="text" id="currentImage2" name="currentImage2" value="<?=$retrieveData['image_sec']?>">
                                    <label>Choose a New File</label>
                                    <input type="file" name="newImage2">
                                </div>
                            </div>
                        </div>

                        <div class="fieldset">
                            <label>Product Image 3</label>
                            <div class="imagePreview">
                                <div class="showImage">
                                    <?php
                                        if($retrieveData["image_tert"]) {
                                            echo "<img src='assets/".$retrieveData['image_tert']."'/>
                                            <button id='deleteImage'>Delete Photo</button>";
                                        }
                                    ?>
                                </div>
                                <div class="imageLabels">
                                    <label>Current Image File</label>
                                    <input type="text" id="currentImage3" name="currentImage3" value="<?=$retrieveData['image_tert']?>">
                                    <label>Choose a New File</label>
                                    <input type="file" name="newImage3">
                                </div>
                            </div>
                        </div>

                        <div class="fieldset">
                            <label>Product Image 4</label>
                            <div class="imagePreview">
                                <div class="showImage">
                                    <?php
                                        if($retrieveData["image_quat"]) {
                                            echo "<img src='assets/".$retrieveData['image_quat']."'/>
                                            <button id='deleteImage'>Delete Photo</button>";
                                        }
                                    ?>
                                </div>
                                <div class="imageLabels">
                                    <label>Current Image File</label>
                                    <input type="text" id="currentImage4" name="currentImage4" value="<?=$retrieveData['image_quat']?>">
                                    <label>Choose a New File</label>
                                    <input type="file" name="newImage4">
                                </div>
                            </div>
                        </div>

                        <div class="fieldset">
                            <label>Servings</label>
                            <textarea name="servings"><?=$retrieveData['servings']?></textarea>
                        </div>

                        <div class="fieldset">
                            <label>Prep Time</label>
                            <textarea name="prep"><?=$retrieveData['prepTime']?></textarea>
                        </div>

                        <div class="fieldset">
                            <label>Bake Time</label>
                            <textarea name="bake"><?=$retrieveData['bakeTime']?></textarea>
                        </div>

                        <div class="fieldset">
                            <label>Included Ingredients</label>
                            <textarea name="included"><?=$retrieveData['included']?></textarea>
                        </div>

                        <div class="fieldset">
                            <label>Not Included Ingredients</label>
                            <textarea name="notIncluded"><?=$retrieveData['notIncluded']?></textarea>
                        </div>

                        <div class="fieldset">
                            <label>Tools Needed</label>
                            <textarea name="tools"><?=$retrieveData['tools']?></textarea>
                        </div>

                        <div class="fieldset">
                            <label>Recipe Details</label>
                            <textarea name="details"><?=$retrieveData['details']?></textarea>
                        </div>
                        
                        <div class="buttonField">
                            <input type="submit" value="Save Page"/>
                            <a href="product_list.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/delete_image.js"></script>

</body>
</html>