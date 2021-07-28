<?php
include("libs/functions.php");
session_start();
confirmLogin();
$title = "Edit Category";
$categoryActive= "active";
$sitecontentActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="linkForm">
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
                    if(isset($_GET["id"])) {
                        $retrieveData = getSingleRecord("SELECT * FROM categories WHERE id='".$_GET["id"]."'");
                        $items = getAllRecords("SELECT * FROM products ORDER BY name");
                    }
                ?>

                <div class="entryForm">
                    <form method="post" action="category_save.php">
                        <div id="smallFieldsets">
                            <input type="hidden" name="id" value="<?=$retrieveData['id']?>">
                            <div class="fieldset mediumField">
                                <label>Category Name</label>
                                <input type="text" name="name" value="<?=$retrieveData['name']?>">
                            </div>
                        </div>
                        <?php
                        if(isset($_GET["id"])) {
                            ?>
                        <div class="fieldset pageLinks">
                            <label>Page Links</label>
                            <?php
                                foreach($items as $data) {
                                    $record = getSingleRecord("SELECT * FROM categorieslinks WHERE productsId='".$data["id"]."' AND categoriesId='".$_GET["id"]."'");
                                    $checked = (isset($record)) ? "checked" : "";
                                    echo "<div class='pageLinks'><input type='checkbox' ".$checked." name='itemIds[]' value='".$data['id']."'> ".$data['name']."</div>";
                                }
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="buttonField">
                            <input type="submit" value="Save Category"/>
                            <a href="category_list.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>