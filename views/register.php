<div class="content login" id="register">
<?=$this->state["nav"]?>
    <div class="wrapper">
        <form action="index.php?controller=form&action=userRegister" method="post" class="requiredForm validatePassword">
            <div class="formContents">
                <h1>Register</h1>
                <div class="fieldset">
                    <label>First Name</label>
                    <div class="errorMsg">
                        <span>* Required Field</span>
                    </div>
                    <input type="text" name="firstName" class="required">
                </div>
                <div class="fieldset">
                    <label>Last Name</label>
                    <div class="errorMsg">
                        <span>* Required Field</span>
                    </div>
                    <input type="text" name="lastName" class="required">
                </div>
                <div class="fieldset">
                    <label>Email Address</label>
                    <div class="errorMsg">
                        <span>* Required Field</span>
                    </div>
                    <input type="text" name="email" class="required">
                </div>
                <div class="fieldset">
                    <label>password</label>
                    <div class="errorMsg">
                        <span>* Required Field</span>
                    </div>
                    <input type="password" name="password" class="required password">
                </div>
                <div class="fieldset">
                    <label>confirm password</label>
                    <div class="errorMsg">
                        <span>* Required Field</span>
                    </div>
                    <input type="password" name="confirmPassword" class="required confirmPassword">
                </div>
                <div class="submit">
                    <input type="submit" class="submitForm" value="Register">
                    <p>Have an account?<a href="index.php?controller=user&action=login">login</a></p>
                </div>
            </div>
        </form>
    </div>
    <?=$this->state["footer"]?>
</div>