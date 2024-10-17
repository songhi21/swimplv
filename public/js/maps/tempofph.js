// let requestAllowedps = true;
function tempoftop() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getTemperatureofPHvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("topval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(sensorData) {
            document.getElementById("topid").textContent = sensorData.sensorId;
            document.getElementById("topval").textContent = sensorData.value;
            $("#topval").counter(0);
            // document.getElementById("toptime").textContent = 'As of: ' + sensorData.updateDate;

            var updateDate = new Date(sensorData.updateDate);
            var options = { 
                timeZone: 'Asia/Manila', 
                year: 'numeric', 
                month: 'long', 
                day: '2-digit', 
                hour: 'numeric', 
                minute: 'numeric', 
                hour12: true 
            };
            var formattedDate = updateDate.toLocaleString('en-US', options);

            document.getElementById("toptime").textContent = 'As of: ' + formattedDate;

            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("topval").value = 0;
            document.getElementById("toptime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(tempoftop, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
tempoftop();
setInterval(tempoftop, 3600000);