$(document).ready(function(){
    $('#contactForm').submit(function(e){
        e.preventDefault();
        
        $('.loading-overlay').show();
        $("#staticBackdrop").hide();
        
        $.ajax({
            url: '/contact/send',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                $('.loading-overlay').hide();
                $("#staticBackdrop").show();
                $('#name').val('');
                $('#email').val('');
                $('#message').val('');
                
                alert('Message sent successfully!');
            },
            error: function(xhr, status, error){
                $('.loading-overlay').hide();
                $("#staticBackdrop").show();
                alert('An error occurred while sending the message.');
                console.error(xhr.responseText);
            }
        });
    });
});