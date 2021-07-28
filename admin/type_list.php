<?php
include("libs/functions.php");
session_start();
confirmLogin();
$title = "Type List";
$typeActive= "active";
$sitecontentActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="contactList">
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
                    <a href='type_form.php'><i class="fas fa-plus"></i>Add A Type</a>
                </div>
                <div id="labels" class="page">
                    <span>ID#</span>
                    <span>Type Name</span>
                    <span class="pageEdits">Edit</span>
                </div>
                <?php
                $results = getAllRecords("SELECT * FROM types ORDER BY name ASC");
                foreach($results as $result) {
                    ?>
                    <div class='page'>
                        <span><?=$result['id']?></span>
                        <span><?=$result['name']?></span>
                        <a href='type_form.php?id=<?=$result['id']?>' class='edit'>Edit</a>
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