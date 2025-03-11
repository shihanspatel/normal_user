<?php include_once("After-login-header.php"); ?>
<script>
    $(document).ready(function() {
        $("#contactForm").validate({
            rules: {
               txt:{
                required:true
               }
            },
            messages: {
               txt:{
                required:"FIll the form first"
               }
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
<br>
    <h2 style="margin-left: 40px;">Contact Us</h2>
    <form id="contactForm" action="edit-profile.php" style="margin-left: 40px;">
        <div class="mb-3">
            <label class="form-label">Change Address</label>
            <textarea class="form-control" rows="4" name="txt" id="txt" required style="width: 80%;"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<br>
    <?php include_once("footer.php"); ?>