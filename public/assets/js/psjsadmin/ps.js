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
            let totalonline = 0;

            $.each(result.data, function(key, value) {
          
                if (value.status === '在线') {
                    totalonline++;
                }
            });

            // Draw the DataTable
            // table.draw(false);

            $('#result tbody').on('click', 'a.btn', function() {

            });

            $("#totaldevices").empty().append(`<h4> ${result.recordsTotal} </h4>`);
            $("#totalonline").empty().append(`<h4> ${totalonline} </h4>`);
            // console.log('Number of pressure sensor devices:', totalonline);

            // Stop further requests if data is displayed
            requestAllowed = false;
            // $('.loading-overlay').hide()
        },
        error: function(error) {
            $("#totaldevices").empty().append(`<h4> 0 </h4>`);
            $("#totalonline").empty().append(`<h4> 0 </h4>`);
            $('.loading-overlay').hide()
            console.error('Error fetching data:', error);

            // alert('Failed to Fetch data. Please try again later');
            // Retry the request after a delay
            // setTimeout(fetchData, 5000); // Retry after 5 seconds (adjust the delay as needed)
        }
    });
}
ps1();
// setInterval(ps1, 1000);


// Fetch data initially

