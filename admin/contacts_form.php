<?php
include("libs/functions.php");
session_start();
confirmLogin();

$title = "Contact Form";
$contactsActive= "dashActive";
include("snippets/header.php");
?>
<body>

<div id="contactForm">
    <div class="container">
        <div class="sidebar">
            <?php
                include("snippets/main_nav.php")
            ?>
        </div>
        <div class="wrapper">
            <header>
                <h1>Contact Admin</h1>
            </header>

            <div class="content">
                <?php
                    $retrieveData['id']="";
                    $retrieveData['name']="";
                    $retrieveData['phone']="";
                    $retrieveData['email']="";
                    $retrieveData['date']="";
                    $retrieveData['message']="";
                    if(isset($_GET["id"])) {
                        $retrieveData = getSingleRecord("SELECT * FROM contacts WHERE id='".$_GET["id"]."'");
                    }
                ?>

                <div class="entryForm">
                    <form method="post" action="contacts_save.php">
                            <input type="hidden" name="contactId" value="<?=$retrieveData['id']?>" readonly class="readonly">
                        <div class="fieldset">
                            <label>Name</label>
                            <input type="text" name="name" value="<?=$retrieveData['name']?>">
                        </div>
                        <div class="fieldset">
                            <label>Phone</label>
                            <input type="number" name="phone" value="<?=$retrieveData['phone']?>">
                        </div>
                        <div class="fieldset">
                            <label>Email</label>
                            <input type="email" name="email" value="<?=$retrieveData['email']?>">
                        </div>
                        <div class="fieldset">
                            <label>Date</label>
                            <input type="date" name="date" value="<?=$retrieveData['date']?>">
                        </div>
                        <div class="fieldset">
                            <label>Message</label>
                            <input type="text" name="message" value="<?=$retrieveData['message']?>">
                        </div>
                        <div class="buttonField">
                            <input type="submit" value="Save Contact"/>
                            <a href="contacts_list.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>