<div class="content login" id="login">
<?=$this->state["nav"]?>
    <div class="wrapper">
    <?php
        $checkout = (isset($_GET["checkout"])) ? "&checkout=".$_GET["checkout"] : "";
    ?>
        <form action="index.php?controller=form&action=userLogin<?=$checkout?>" method="post" class="requiredForm">
            <div class="formContents">
                <h1>Login</h1>
                <div class="fieldset">
                    <label>Email Address</label>
                    <div class="errorMsg">
                        <span>* Please enter your email</span>
                    </div>
                    <input type="text" name="email" class="required">
                </div>
                <div class="fieldset">
                    <label>Password</label>
                    <a href="index.php?controller=user&action=enterEmail" class="forgotPass">forgot password?</a>
                    <div class="errorMsg">
                        <span>* Please enter your email</span>
                    </div>
                    <input type="password" name="password" class="required">
                </div>
                <div class="submit">
                    <input type="submit" value="Login">
                    <p>new customer?<a href="index.php?controller=user&action=register">sign up</a></p>
                </div>
            </div>
        </form>
    </div>
    <?=$this->state["footer"]?>
</div>