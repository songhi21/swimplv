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
function fetchdata() {
    var idps = $('#hiddenId').val();

    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    $.ajax({
        url: '/getDatadevicevalue/'+ idps,
        method: 'GET',
        beforeSend: function() {
            $("#idps").empty().append('Loading..');
            $("#devicename").empty().append('Loading..');
            $("#networktype").empty().append('Loading..');

            $("#status").empty().append('Loading..');
            $("#receiveTime").empty().append('Loading..');
            $("#currentValue").empty().append('Loading..');
            $("#rssi").empty().append('Loading..');
            $("#power").empty().append('Loading..');
            // Start the loading timer
            this.loadingTimer = setTimeout(function() {
                console.log("Loading is taking too long. Reloading the page...");
                location.reload(); // Reload the page
            }, 300000); // 30 seconds (adjust the threshold as needed)
        },
        complete: function() {
            // Clear the loading timer
            clearTimeout(this.loadingTimer);
        },
        success: function(result) {
            var id = $('#hiddenId').val();

            $("#idps").empty().append(result.data['id']);
            $("#devicename").empty().append(result.data['devicename']);
            $("#networktype").empty().append('4G');

            $("#status").empty().append(`${result.data['status'] == '在线' ? 'online' : 'offline'}`);
            $("#receiveTime").empty().append(result.data['receiveTime']);
            $("#currentValue").empty().append(result.data['currentValue']);
            $("#rssi").empty().append(result.data['rssi']);
            $("#power").empty().append(result.data['power']);

            

            // Update any other UI elements or perform additional tasks as needed
            // $("#totaldevices").empty().append(`<h4> Total number of Devices: ${pressureSensorCount} </h4>`);
            // $("#totalonline").empty().append(`<h4> Number of Online Devices: ${totalonline} </h4>`);

            

            requestAllowed = false;
            $('.loading-overlay').hide()
        },
        error: function(error) {

            $('.loading-overlay').hide()
            setTimeout(fetchdata, 1000);
            console.error('Error fetching data:', error);
            


        }
    });
}
fetchdata();
$('#loading-overlay').hide();
// setInterval(ps1, 1000);


// Fetch data initially

