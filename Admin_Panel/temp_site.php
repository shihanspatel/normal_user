<?php
include('demo1.php');
?>
<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.bundle.min.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script src="additional-methods.min.js"></script>

<style>
    body.dark-mode {
        background-color: #222;
        color: white;
    }

    body.dark-mode .card {
        background-color: #333;
        color: white;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .is-valid {
        border-color: #28a745;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
    }
</style>

<div class="col-xxl-9 p-4">
    <div class="card shadow-sm p-4">
        <h1 class="mb-3">Site Settings</h1>
        <button class="dark-mode-toggle btn btn-dark mb-3" onclick="toggleDarkMode()">🌙 Toggle Dark Mode</button>

        <form id="settingsForm">
            <div class="mb-3">
                <label for="site_name" class="form-label">Website Name:</label>
                <input type="text" id="site_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email:</label>
                <input type="email" id="contact_email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" id="phone_number" class="form-control">
            </div>

            <div class="mb-3">
                <label for="theme_color" class="form-label">Theme Color:</label>
                <input type="color" id="theme_color" class="form-control form-control-color">
                <div id="theme_preview" class="mt-2 p-2 rounded" style="background-color: #ffffff; width: 100%;"></div>
            </div>

            <div class="mb-3">
                <label for="site_logo" class="form-label">Logo:</label>
                <input type="file" id="site_logo" class="form-control" accept="image/*">
                <img id="logo_preview" class="image-preview mt-2" src="images/soe2.avif" alt="Logo Preview" style="max-width: 100px;">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">💾 Save Settings</button>
                <button type="button" class="btn btn-warning" onclick="resetSettings()">🔄 Reset to Default</button>
                <button type="button" class="btn btn-success" onclick="exportSettings()">📂 Export Settings</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleDarkMode() {
        document.body.classList.toggle("dark-mode");
        localStorage.setItem("darkMode", document.body.classList.contains("dark-mode"));
    }

    if (localStorage.getItem("darkMode") === "true") {
        document.body.classList.add("dark-mode");
    }

    $("#theme_color").on("input", function() {
        $("#theme_preview").css("background-color", $(this).val());
    });

    $("#site_logo").on("change", function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            $("#logo_preview").attr("src", reader.result);
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    });

    $("#settingsForm").validate({
        rules: {
            site_name: {
                required: true,
                minlength: 5,
                maxlength: 50,
                pattern: /^[a-zA-Z0-9 ]+$/
            },
            contact_email: {
                required: true,
                email: true
            },
            phone_number: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true
            },
            theme_color: {
                required: true
            },
            site_logo: {
                required: true,
                extension: "jpg|jpeg|png|gif|bmp"
            }
        },
        messages: {
            site_name: {
                required: "Please enter the website name",
                minlength: "Website name must be at least 5 characters long",
                maxlength: "Website name cannot exceed 50 characters",
                pattern: "Website name can only contain letters, numbers, and spaces"
            },
            contact_email: {
                required: "Please enter a contact email",
                email: "Please enter a valid email address"
            },
            phone_number: {
                required: "Please enter a phone number",
                minlength: "Phone number should be exactly 10 digits long",
                maxlength: "Phone number should be exactly 10 digits long",
                digits: "Phone number can only contain numbers"
            },
            theme_color: {
                required: "Please choose a theme color"
            },
            site_logo: {
                required: "Please upload a logo",
                extension: "Only image files (jpg, jpeg, png, gif, bmp) are allowed"
            }
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            error.insertAfter(element);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function(form) {
            alert("Settings validated and ready for submission!");
            form.submit();
        }
    });

    function resetSettings() {
        $("#settingsForm")[0].reset();
        $("#theme_preview").css("background-color", "#ffffff");
        $("#logo_preview").attr("src", "images/soe2.avif");
    }

    function exportSettings() {
        const settings = {
            site_name: $("#site_name").val(),
            contact_email: $("#contact_email").val(),
            phone_number: $("#phone_number").val(),
            theme_color: $("#theme_color").val()
        };
        const blob = new Blob([JSON.stringify(settings, null, 2)], {
            type: "application/json"
        });
        const a = document.createElement("a");
        a.href = URL.createObjectURL(blob);
        a.download = "site_settings.json";
        a.click();
    }
</script>