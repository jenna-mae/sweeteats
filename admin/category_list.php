<?php
include("libs/functions.php");
session_start();
confirmLogin();
$title = "Category List";
$categoryActive= "active";
$sitecontentActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="linksList">
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

            <div class="content">
                <div class="btnPrimary">
                    <a href="category_form.php"><i class="fas fa-plus"></i>Add A New Category</a>
                </div>

                <div id="labels" class="page">
                    <span>ID#</span>
                    <span>Category Name</span>
                    <span class="pageEdits">Manage</span>
                </div>

                <?php
                $categories = getAllRecords("SELECT * FROM categories");

                foreach($categories as $category) {
                    ?>
                    <div class='page'>
                        <span><?=$category['id']?></span>
                        <span><?=$category['name']?></span>
                        <a href='category_form.php?id=<?=$category['id']?>' class='edit'>Manage</a>
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