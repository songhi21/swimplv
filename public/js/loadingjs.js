$(document).ready(function() {
    // Show content when page is fully loaded
    $(window).on("load", function() {
        $("#loading-overlay").fadeOut("slow", function() {
            $("#content").fadeIn("slow");
        });
    });
});