// let requestAllowedps = true;
function ph() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getphvalue',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("phval").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function(phvalueresult) {
            document.getElementById("phid").textContent = phvalueresult.sensorId;
            document.getElementById("phval").textContent = phvalueresult.value;
            $("#phval").counter(0);
            var updateDate = new Date(phvalueresult.updateDate);
            var formattedDate = updateDate.toLocaleString('en-US', { timeZone: 'UTC', month: 'long', day: '2-digit', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true });

            document.getElementById("phtime").textContent = 'As of: ' + formattedDate;
            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("phval").value = 0;
            document.getElementById("phtime").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(ph, 1000);
            requestAllowed = true;  
            
            

        }
    });
}
ph();
setInterval(ph, 3600000);