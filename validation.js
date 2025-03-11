$(document).ready(function () {

    function validateField(input) {
        let field = $(input);
        let value = field.val().trim();
        let errorSpan = $("#" + field.attr("name") + "Error");
        let fieldType = field.data("validation") || "";
        let minLength = field.data("min") || 0;
        let maxLength = field.data("max") || 9999;
        let errorMessage = "";

        // Required Field Validation
        if (fieldType.includes("required") && value === "") {
            errorMessage = "This field is required.";
        }
        
        // Email Validation
        else if (fieldType.includes("email") && !/^\S+@\S+\.\S+$/.test(value)) {
            errorMessage = "Enter a valid email.";
        }
        
        // Strong Password Validation
        else if (field.attr("id") === "password" && !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/.test(value)) {
            errorMessage = "Password must be at least 8 characters, including uppercase, lowercase, a number, and a special character.";
        }

        // Confirm Password Validation
        else if (field.attr("id") === "c_password") {
            let password = $("#password").val().trim();
            if (value !== password) {
                errorMessage = "Passwords do not match.";
            }
        }

        // Terms & Conditions Checkbox Validation
        else if (fieldType.includes("terms") && !field.is(":checked")) {
            errorMessage = "You must agree to the Terms & Conditions.";
        }
        
        // Only Alphabet Validation
        else if (fieldType.includes("alpha") && !/^[A-Za-z\s]+$/.test(value)) {
            errorMessage = "Only letters are allowed.";
        }
        
        // Only Numeric Validation
        else if (fieldType.includes("numeric") && !/^\d+$/.test(value)) {
            errorMessage = "Only numbers are allowed.";
        }
        
        // Minimum Character Length Validation
        else if (fieldType.includes("min") && value.length < minLength) {
            errorMessage = `Must be at least ${minLength} characters.`;
        }
        
        // Maximum Character Length Validation
        else if (fieldType.includes("max") && value.length > maxLength) {
            errorMessage = `Must be less than ${maxLength} characters.`;
        }
        
        // Description Length Validation
        else if (fieldType.includes("description") && value.length < 10) {
            errorMessage = "Description must be at least 10 characters long.";
        }

        // File Upload Validation
        else if (fieldType.includes("file")) {
            let file = field[0].files[0];
            if (!file) {
                errorMessage = "Please select a file.";
            } else if (!/\.(jpg|jpeg|png)$/i.test(file.name)) {
                errorMessage = "Only JPG, JPEG, or PNG files are allowed.";
            } else if (file.size > 200000) {
                errorMessage = "File size must be less than 200KB.";
            }
        }

        // URL Validation
        else if (fieldType.includes("url") && !/^(https?:\/\/[^\s]+)/.test(value)) {
            errorMessage = "Enter a valid URL.";
        }

        // Display Error or Success Styles
        if (errorMessage) {
            errorSpan.text(errorMessage).show();
            field.addClass("is-invalid").removeClass("is-valid");
        } else {
            errorSpan.text("").hide();
            field.addClass("is-valid").removeClass("is-invalid");
        }
    }

    // Validate Fields on Blur Event
    $("input, select, textarea").on("blur", function () {
        validateField(this);
    });

    // Validate Form on Submit
    $("form").on("submit", function (e) {
        let isValid = true;
        let form = $(this);

        form.find("input, select, textarea").each(function () {
            validateField(this);
            if ($(this).hasClass("is-invalid")) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();  
            e.stopPropagation(); 
        }
    });

    // Validate on Button Click
    $("#userForm, #login-form, #contactForm, #contactForm, #registrationForm").on("click", function (e) {
        let form = $(this).closest("form");
        let isValid = true;

        form.find("input, select, textarea").each(function () {
            validateField(this);
            if ($(this).hasClass("is-invalid")) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();  
            e.stopPropagation();
        }
    });

});
