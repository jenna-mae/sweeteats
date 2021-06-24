<div class="content login" id="password">
<?=$this->state["nav"]?>
    <div class="wrapper">
        <form action="index.php?controller=form&action=newPassword" method="post" class="requiredForm">
            <div class="formContents">
                <h1>Create New Password</h1>
                <input type="hidden" name="token" value="<?=$_GET["token"]?>">
                <div class="fieldset">
                    <label>New Password</label>
                    <div class="errorMsg">
                        <span>* Please enter password</span>
                    </div>
                    <input type="password" name="newPassword" class="required">
                </div>
                <div class="fieldset">
                    <label>Confirm New Password</label>
                    <div class="errorMsg">
                        <span>* Please enter password</span>
                    </div>
                    <input type="password" name="confirmPassword" class="required">
                </div>
                <div class="submit">
                    <input type="submit" value="submit">
                    <p>back to<a href="index.php?controller=user&action=login">log in</a></p>
                </div>
            </div>
        </form>
    </div>
    <?=$this->state["footer"]?>
</div>