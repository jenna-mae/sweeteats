const PasswordValidator = function(element) {
    const validator = this;
    validator.form = element;
    validator.submitBtn = document.querySelector(".submitForm");

    validator.submitBtn.addEventListener("click", function(e) {
        let password = document.querySelector(".password");
        let confirmPassword = document.querySelector(".confirmPassword");

        if(password.value != confirmPassword.value) {
            e.preventDefault();
            document.querySelector(".password").style.border="2px solid red";
            document.querySelector(".confirmPassword").style.border="2px solid red";
        }
    })
}

let formsToValidate = document.querySelectorAll(".validatePassword");

formsToValidate.forEach(function(form) {
    new PasswordValidator(form)
})