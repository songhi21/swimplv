// Function to reset reCAPTCHA

$(document).ready(function() {
    // Add submit event listener to the form
    function resetRecaptcha() {
        try {
            grecaptcha.reset();
        } catch (error) {
            console.error("Error resetting reCAPTCHA:", error.message);
        }
    }
    $('#reset-recaptcha').click(function() {
        // Disable the reset button
        $('#reset-recaptcha').prop('disabled', true);

        // Reset reCAPTCHA
        resetRecaptcha();

        // Alert that reCAPTCHA has been reset
        alert("reCAPTCHA has been reset");

        // Enable the reset button after reset is complete
        $('#reset-recaptcha').prop('disabled', false);
    });
    $('#login-form').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Clear previous error messages
        $('.invalid-feedback').text('');

        // Validate reCAPTCHA response
        var recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            $('#captcha-error').text('Please complete the reCAPTCHA challenge.');
            return;
        }

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            beforeSend: function() {
                $('#loading-overlay').show();
                document.getElementById("btnsubmit").disabled = true;
            },
            success: function(response) {
                $('#loading-overlay').hide();
                grecaptcha.reset(); // Reset reCAPTCHA
                window.location.href = '/home';
            },
            error: function(xhr, status, error) {
                alert('Wrong Username and Password.');
                $('#login-form')[0].reset();
                $('#loading-overlay').hide();
                $('.invalid-feedback').empty();
                document.getElementById("btnsubmit").disabled = false;
                resetRecaptcha(); // Reset reCAPTCHA
            }
        });
    });
});
