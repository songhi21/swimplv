// let requestAllowedps = true;
function conductivity() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stoped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getConductivityvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("conductivityval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(sensorData) {
            document.getElementById("conductivityid").textContent = sensorData.sensorId;
            document.getElementById("conductivityval").textContent = sensorData.value;
            // document.getElementById("conductivitytime").textContent = 'As of: ' + sensorData.updateDate;
            $("#conductivityval").counter(0);
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
            
            document.getElementById("conductivitytime").textContent = 'As of: ' + formattedDate;


            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("conductivityval").value = 0;
            document.getElementById("conductivitytime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(conductivity, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
conductivity();
setInterval(conductivity, 3600000);