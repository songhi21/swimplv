let requestAllowed = true;

// animationeffectcount------------
$.fn.counter = function(start){  
    var $el = this;
  
    $el.prop('Counter', start).animate({
        Counter: $el.text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function(now) {
            $el.text(now.toFixed(2)); // Round to nearest integer
        }
    });
};
// ____________________end

function fetchdata() {
    var idps = $('#hiddenId').val();

    if (!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }

    $.ajax({
        url: '/getsingledevicehistorical/' + idps,
        method: 'GET',
        cache: true, // Enable caching
        beforeSend: function() {
            // Show loading spinner or overlay
            $('#loading-overlay').show();
        },
        success: function(data) {
            var sensorData = data.data[0];
            if (sensorData) {
                // Update DOM elements with received data
                $("#idps").text(sensorData['id']);
                $("#devicename").text(sensorData['sensorName']);
                $("#Unit").text(sensorData['unit']);
                $("#updateDate").text(sensorData['updateDate']);
                $("#val").text(sensorData['value']);
            } else {
                console.log('No sensor data found.');
            }

            // Reset the flag
            requestAllowed = false;
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            // Retry fetching data after a delay
            setTimeout(fetchdata, 1000);
        },
        complete: function() {
            // Hide loading spinner or overlay
            $('#loading-overlay').hide();
        }
    });
}

// Initial data fetch
fetchdata();
