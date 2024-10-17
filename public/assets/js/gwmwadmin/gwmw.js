let requestAllowed = true;

// animationeffectcount------------
$.fn.counter = function(start){  
    var $el = this;
  
    $el.prop('Counter',start).animate({
      Counter: $el.text()
    }, {
      duration: 4000,
      easing: 'swing',
      step: function (now) {
        $el.text(now.toFixed(2)); // Round to nearest integer
      }
    });
  };
// ____________________end
function gwmw() {
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    $.ajax({
        url: '/getalldevicecounttotalvalue',
        method: 'GET',
        beforeSend: function() {
            $("#totaldevices").empty().append(`Loading..`);
            // Start the loading timer
            this.loadingTimer = setTimeout(function() {
                console.log("Loading is taking too long. Reloading the page...");
                location.reload(); // Reload the page
            }, 600000); // 30 seconds (adjust the threshold as needed)
        },
        complete: function() {
            // Clear the loading timer
            clearTimeout(this.loadingTimer);
        },
        success: function(total) {

            // Get the total value
            var totalValue = parseInt(total.totaldevices);

            // Set the initial value to 0
            $("#totaldevices").text(0);

            // Animate the counter from 0 to the total value
            $("#totaldevices").animate({
                Counter: totalValue
            }, {
                duration: 1000, // Adjust the duration as needed
                step: function(now) {
                    $(this).text(Math.ceil(now)); // Update the text with the current value
                }
            });
            requestAllowed = false;
        },
        error: function(error) {
            $("#totaldevices").empty().append(`<h4> 0 </h4>`);
            // $("#totalonline").empty().append(`<h4> 0 </h4>`);
            $('.loading-overlay').hide()
            setTimeout(gwmw, 5000); // Retry after 5 seconds (adjust the delay as needed)
            console.error('Error fetching data:', error);

            // alert('Failed to Fetch data. Please try again later');
            // Retry the request after a delay
        
        }
    });
}
gwmw();
// setInterval(ps1, 1000);
$('#loading-overlay').hide();

// Fetch data initially

