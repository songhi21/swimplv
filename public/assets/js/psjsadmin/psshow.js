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
            var id = $('#hiddenId').val();

            $.each(result.data, function(key, value) {
                if(value['id'] == id){
                    
                    $("#idps").empty().append(value['id']);
                    $("#devicename").empty().append(`4G`);
                    $("#networktype").empty().append(`${value['id'] == '233614970' ? 'Pressure Sensor 1 (Bar)' : (value['id'] == '233614971' ? 'Pressure Sensor 2 (Bar)' : (value['id'] == '233614969' ? 'Pressure Sensor 3 (Bar)' : (value['id'] == '233614968' ? 'Pressure Sensor 4 (Bar)' : 'Pressure Sensor')))}`);
                    // $("#Devicetype").empty().append(value['Devicetype']);
                    $("#status").empty().append(`${value['status'] == '在线' ? 'online' : 'offline'}`);
                    $("#receiveTime").empty().append(value['receiveTime']);
                    $("#currentValue").empty().append(value['currentValue']);
                    $("#rssi").empty().append(value['rssi']);
                    $("#power").empty().append(value['power']);
                    
                }

                

            });

            

            // Update any other UI elements or perform additional tasks as needed
            // $("#totaldevices").empty().append(`<h4> Total number of Devices: ${pressureSensorCount} </h4>`);
            // $("#totalonline").empty().append(`<h4> Number of Online Devices: ${totalonline} </h4>`);

            

            requestAllowed = false;
            $('.loading-overlay').hide()
        },
        error: function(error) {

            $('.loading-overlay').hide()
            console.error('Error fetching data:', error);


        }
    });
}
fetchdata();
// setInterval(ps1, 1000);


// Fetch data initially

