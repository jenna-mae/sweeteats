<?php
include("libs/functions.php");
session_start();
confirmLogin();

$title = "Product List";
$productActive= "active";
$sitecontentActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="pagesList">
    <div class="container">
        <div class="sidebar">
            <?php
                include("snippets/main_nav.php")
            ?>
        </div>

        <div class="wrapper">
            <header>
                <h1>Site Content Admin</h1>
                <?php
                    include("snippets/pages_nav.php")
                ?>
            </header>

            <?php
                $_GET["success"] = (isset($_GET["success"])) ? $_GET["success"] : false;
                    if($_GET["success"]) {
                        echo "<div class='success'><p>Product Saved</p></div>";
                    };

                $_GET["deleted"] = (isset($_GET["deleted"])) ? $_GET["deleted"] : false;
                    if($_GET["deleted"]) {
                        echo "<div class='deleted'><p>Product Deleted</p></div>";
                    };
            ?>

            <div class="content">
                <div class="btnPrimary">
                    <a href="product_form.php"><i class="fas fa-plus"></i>Add A New Product</a>
                </div>

                <div id="labels" class="page">
                    <span>ID#</span>
                    <span>Product Name</span>
                    <span class="pageEdits">Edit Entry</span>
                    <span class="pageEdits">Delete Entry</span>
                </div>

                <?php
                $sql = "SELECT * FROM products ORDER BY name ASC";
                $results = getAllRecords($sql);

                foreach($results as $result) {
                    ?>
                    <div class='page'>
                        <span><?=$result['id']?></span>
                        <span><?=$result['name']?></span>
                        <a href='product_form.php?id=<?=$result['id']?>' class='edit'>Edit</a>
                        <a href='product_delete.php?id=<?=$result["id"]?>' onClick='return confirm("are you sure?")' class='delete'>Delete</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>