// let requestAllowedps = true;
function tds() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stoped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/gettdsvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("tdsval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(sensorData) {
            document.getElementById("tdsid").textContent = sensorData.sensorId;
            document.getElementById("tdsval").textContent = sensorData.value;
            $("#tdsval").counter(0);
            // document.getElementById("tdstime").textContent = 'As of: ' + sensorData.updateDate;

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

            document.getElementById("tdstime").textContent = 'As of: ' + formattedDate;
            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("tdsval").value = 0;
            document.getElementById("tdstime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(tds, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
tds();
setInterval(tds, 3600000);