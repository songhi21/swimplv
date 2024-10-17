// let requestAllowedps = true;
function levelsensor() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getlevelsensorvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("levelsensorval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(phvalueresult) {
            document.getElementById("levelsensorid").textContent = phvalueresult.sensorId;
            document.getElementById("levelsensorval").textContent = phvalueresult.value;
            $("#levelsensorval").counter(0);
            var updateDate = new Date(phvalueresult.updateDate);
            var formattedDate = updateDate.toLocaleString('en-US', { timeZone: 'UTC', month: 'long', day: '2-digit', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true });

            document.getElementById("levelsensortime").textContent = 'As of: ' + formattedDate;
            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("levelsensorval").value = 0;
            document.getElementById("levelsensortime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(ph, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
levelsensor();
setInterval(ph, 3600000);