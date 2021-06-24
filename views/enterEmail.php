<div class="content login" id="email">
<?=$this->state["nav"]?>
    <div class="wrapper">
        <form action="index.php?controller=form&action=passwordReset" method="post" class="requiredForm">
            <div class="formContents">
                <h1>Enter Your Email Address</h1>
                <div class="fieldset">
                    <label>Email Address</label>
                    <div class="errorMsg">
                        <span>* Please enter your email</span>
                    </div>
                    <input type="text" name="email" class="required">
                </div>
                <div class="submit">
                    <input type="submit" value="reset" name="resetPass">
                    <p>back to<a href="index.php?controller=user&action=login">login</a></p>
                </div>
            </div>
        </form>
    </div>
    <?=$this->state["footer"]?>
</div>