// let requestAllowedps = true;
function ps1() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getDataps-1admin',
        method: 'GET',
        // beforeSend: function(){
        // },
        success: function(dataps1) {

            document.getElementById("ps1").value = dataps1.currentValue;
            document.getElementById("ps1time").textContent = 'As of: ' + dataps1.CommunicationTime;
            requestAllowed = true; 
        },
        error: function (error) {
            document.getElementById("ps1").value = 0;
            document.getElementById("ps1time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            requestAllowed = false; 

        }
    });
}
ps1();
setInterval(ps1, 3600000);

function ps2() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getDataps-2admin',
        method: 'GET',
        // beforeSend: function(){
        // },
        success: function(dataps2) {
            document.getElementById("ps2").value = dataps2.currentValue;
            document.getElementById("ps2time").textContent = 'As of: ' +  dataps2.CommunicationTime; 
            requestAllowed = true; 

        
        },
        error: function (error) {
            document.getElementById("ps2").value = 0;
            document.getElementById("ps2time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            requestAllowed = false; 

        }
    });
}
ps2();
setInterval(ps2, 3600000);
function ps3() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getDataps-3admin',
        method: 'GET',
        // beforeSend: function(){
        // },
        success: function(dataps3) {
            document.getElementById("ps3").value = dataps3.currentValue;
            document.getElementById("ps3time").textContent = 'As of: ' + dataps3.CommunicationTime;
            requestAllowed = true; 
            
            // // document.getElementById("ps1").textContent = dataps1.currentValue;
            // console.log(dataps1.currentValue);
        
        },
        error: function (error) {
            document.getElementById("ps3").value = 0;
            document.getElementById("ps3time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            requestAllowed = false; 


        }
    });
}
ps3();
setInterval(ps3, 3600000);

function ps4() {
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getDataps-3admin',
        method: 'GET',
        // beforeSend: function(){
        // },
        success: function(dataps4) {
            document.getElementById("ps4").value = dataps4.currentValue;
            document.getElementById("ps4time").textContent = 'As of: ' + dataps4.CommunicationTime;
            requestAllowed = true; 

            // // document.getElementById("ps1").textContent = dataps1.currentValue;
            // console.log(dataps1.currentValue);
        
        },
        error: function (error) {
            document.getElementById("ps4").value = 0;
            document.getElementById("ps4time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            requestAllowed = false; 


        }
    });
}
ps4();
setInterval(ps4, 3600000);