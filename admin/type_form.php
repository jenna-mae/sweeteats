<?php
include("libs/functions.php");
session_start();
confirmLogin();
$title = "Edit Type";
$typeActive= "active";
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
                        $retrieveData = getSingleRecord("SELECT * FROM types WHERE id='".$_GET["id"]."'");
                    }
                ?>

                <div class="entryForm">
                    <form method="post" action="type_save.php">
                        <div id="smallFieldsets">
                            <input type="hidden" name="id" value="<?=$retrieveData['id']?>">
                            <div class="fieldset mediumField">
                                <label>Type Name</label>
                                <input type="text" name="name" value="<?=$retrieveData['name']?>">
                            </div>
                        </div>
                        
                        <div class="buttonField">
                            <input type="submit" value="Save Type"/>
                            <a href="type_list.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>