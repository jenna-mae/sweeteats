const Validator = function() {
    const validator = this;
    validator.form = document.querySelector(".requiredForm");
    validator.bDisplayError = false;

    validator.init = function() {
        validator.bDisplayError = false;
        validator.requiredFields = document.querySelectorAll(".required");

        validator.requiredFields.forEach(function(fieldset) {
            if(fieldset.value == "") {
                fieldset.classList.add("displayError");
                fieldset.parentNode.classList.add("displayErrorMsg");
                validator.bDisplayError = true;
            } else {
                fieldset.classList.remove("displayError");
                fieldset.parentNode.classList.remove("displayErrorMsg");
            }
        }) 
    }

    validator.form.addEventListener("submit", function(e) {
        validator.init();
        if(validator.bDisplayError) {
            e.preventDefault();
        }
    })
}