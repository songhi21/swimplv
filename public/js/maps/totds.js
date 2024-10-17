// let requestAllowedps = true;
function TemperatureofTDS() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stoped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getConductivityvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("TemperatureofTDSval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(sensorData) {
            document.getElementById("TemperatureofTDSid").textContent = sensorData.sensorId;
            document.getElementById("TemperatureofTDSval").textContent = sensorData.value;
            $("#TemperatureofTDSval").counter(0);
            // document.getElementById("TemperatureofTDStime").textContent = 'As of: ' + sensorData.updateDate;

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
            var formattedDate = updateDate.toLocaleString('en-US',options);

            document.getElementById("TemperatureofTDStime").textContent = 'As of: ' + formattedDate;


            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("TemperatureofTDSval").value = 0;
            document.getElementById("TemperatureofTDStime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(TemperatureofTDS, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
TemperatureofTDS();
setInterval(TemperatureofTDS, 3600000);