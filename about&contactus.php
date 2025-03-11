<?php
include_once("After-login-header.php");
?>
<style>
    .text{
        text-align: justify;
    }
</style>
<script>
    $(document).ready(function() {
        $("#contactForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },

                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                name: {
                    required: "First name is required.",
                    minlength: "First name must be at least 2 characters long."
                },

                email: {
                    required: "Email is required.",
                    email: "Please enter a valid email address."
                },
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass("text-danger mt-1 small");
                error.insertAfter(element);
            },
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            }
        });
    });
</script>

<div class="container mt-5">

    <section id="louisvuitton" class="mt-5">
        <h2 class="text">About Louis Vuitton</h2>
        <p class="text">

            We take pride in curating an authentic space for those who appreciate luxury, craftsmanship, and timeless fashion. Our team is dedicated to providing valuable insights, reviews, and historical perspectives on Louis Vuitton and the broader world of haute couture.
            <br>
            Our goal is to create a community where fashion enthusiasts can explore trends, gain styling inspiration, and learn about the meticulous artistry behind iconic luxury products. Whether you’re a seasoned collector or new to high-end fashion, we strive to offer engaging content that deepens your appreciation for premium craftsmanship.
            <br>
            At our core, we believe that fashion is more than just clothing—it’s an art form, a statement, and a legacy. Join us on this journey as we celebrate elegance, innovation, and the impact of luxury design on the modern world.
        </p>
    </section>

    <section id="contact" class="mt-5 " >
        <h2>Contact Us</h2>
        <form id="contactForm">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
</div>
<br>
<?php include_once("footer.php"); ?>