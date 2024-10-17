$(document).ready(function() {
    // Add submit event listener to the form
    $('#reset-password-form').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Validate email
        var email = $('#email').val();
        if (!email) {
            $('#email-error').text('Please enter your email address.');
            return;
        }

        // Validate reCAPTCHA response
        var recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            $('.recaptcha-error').text('Please complete the reCAPTCHA challenge.');
            return;
        }

        // AJAX request for form submission
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            beforeSend: function() {
                $('#loading-overlay').show();
            },
            success: function(response) {
                // Reset form, clear error messages, and hide loading overlay
                $('#reset-password-form')[0].reset();
                $('.recaptcha-error').empty();
                $('#email-error').empty();
                $('#loading-overlay').hide();
                alert(response.message); // Display success message
                grecaptcha.reset(); // Reset reCAPTCHA
            },
            error: function(xhr, status, error) {
                // Display error message, reset form, clear error messages, and hide loading overlay
                console.log(xhr); // Log xhr object to console for debugging
                $('#loading-overlay').hide();
                $('#reset-password-form')[0].reset();
                $('.recaptcha-error').empty();
                $('#email-error').empty();
                alert('Error occurred. Please check console for details. Make sure the email is existed in the system.'); // Display generic error message
                grecaptcha.reset(); // Reset reCAPTCHA
            }
        });
    });
});
