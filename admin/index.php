<?php
$title = "Login";
include("snippets/header.php")
?>
<body>

<div id="loginPage">
    <div class="wrapper">
        <div class="loginForm">
            <form method="post" action="processlogin.php">
                <h1>Admin Log In</h1>
                <?php
                    $_GET["error"] = (isset($_GET["error"])) ? $_GET["error"] : false;
                        if($_GET["error"]) {
                            echo "<div class='error'><p>Username or password is incorrect</p></div>";
                        };
                ?>
                <div class="fieldset">
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                <div class="fieldset">
                    <label>Password</label>
                    <input type="password" name="password"/>
                </div>
                <div class="fieldset submitFieldset">
                    <input type="submit" value="login now"/>
                </div>

            </form>
        </div>
    </div>
</div>
    
</body>
</html>