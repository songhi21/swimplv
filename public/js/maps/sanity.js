// let requestAllowedps = true;
function salinity() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stoped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getsalinityvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("salinityval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(sensorData) {
            document.getElementById("salinityid").textContent = sensorData.sensorId;
            document.getElementById("salinityval").textContent = sensorData.value;
            $("#salinityval").counter(0);
            // document.getElementById("").textContent = 'As of: ' + sensorData.updateDate;
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

            document.getElementById("salinitytime").textContent = 'As of: ' + formattedDate;
            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("salinityval").value = 0;
            document.getElementById("salinitytime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(salinity, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
salinity();
setInterval(salinity, 3600000);