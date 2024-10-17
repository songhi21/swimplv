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
function ps1() {
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    $.ajax({
        url: '/getDatapsdevicelist-admin',
        method: 'GET',
        beforeSend: function() {
            // Start the loading timer
            $("#totaldevices").html('loading..');
            $("#totalonline").html('loading..');
            this.loadingTimer = setTimeout(function() {
                console.log("Loading is taking too long. Reloading the page...");
                location.reload(); // Reload the page
            }, 30000); // 30 seconds (adjust the threshold as needed)
        },
        complete: function() {
            // Clear the loading timer
            clearTimeout(this.loadingTimer);
        },
        success: function(result) {
            let pressureSensorCount = 0;
            let totalOnline = 0;
            result.data.forEach(function(item) {
                if (item.status === '在线') {
                    totalOnline++;
                }
            });

            // Animate the counter for total devices
            $("#totaldevices").prop('Counter', 0).animate({
                Counter: result.recordsTotal
            }, {
                duration: 1000, // Adjust the duration as needed
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });

            // Animate the counter for total online devices
            $("#totalonline").prop('Counter', 0).animate({
                Counter: totalOnline
            }, {
                duration: 1000, // Adjust the duration as needed
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });

            // Stop further requests if data is displayed
            requestAllowed = false;
            $('.loading-overlay').hide();
        },
        error: function(error) {
            $("#totaldevices").empty().append(`<h4> 0 </h4>`);
            $("#totalonline").empty().append(`<h4> 0 </h4>`);
            $('.loading-overlay').hide();
            setTimeout(ps1, 1000); // Retry after 5 seconds (adjust the delay as needed)
            console.error('Error fetching data:', error);

            // alert('Failed to Fetch data. Please try again later');
            // Retry the request after a delay
        
        }
    });
}
ps1();
// setInterval(ps1, 1000);
$('#loading-overlay').hide();

// Fetch data initially

