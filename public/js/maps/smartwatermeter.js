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
function Smartmetter1() {
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    // Make an AJAX request to the Laravel route-------getDataSmartmetter-4
    $.ajax({
        url: '/getDataSmartmetter-1admin',
        method: 'GET',
        // beforeSend: function(){
        // },
        beforeSend: function(){
            document.getElementById("Smartmetter1").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function (dataswm) {
            document.getElementById("Smartmetter1id").textContent = dataswm.deviceid ;
            document.getElementById("Smartmetter1").textContent = dataswm.PositiveCumulativeFlow ;
            document.getElementById("Smartmetter1time").textContent = 'As of: ' +dataswm.CommunicationTime;
            $("#Smartmetter1").counter(0);
            requestAllowed = true; 
             
            
            
            // console.log();
        
        
        },
        error: function (error) {
            document.getElementById("Smartmetter1").textContent = 0 +' m3';
            document.getElementById("Smartmetter1time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(Smartmetter1, 1000);
            requestAllowed = true; 

        }
    });
}
Smartmetter1();
setInterval(Smartmetter1, 3600000);
function Smartmetter2() {
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getDataSmartmetter-2admin',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("Smartmetter2").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function (dataswm2) {
            // Update the popup content with Laravel controller return value
            document.getElementById("Smartmetter2id").textContent = dataswm2.deviceid ;
            document.getElementById("Smartmetter2").textContent = dataswm2.PositiveCumulativeFlow;
            $("#Smartmetter2").counter(0);
            document.getElementById("Smartmetter2time").textContent = 'As of: ' +dataswm2.CommunicationTime;
            requestAllowed = true; 
            

        },
        error: function (error) {
            
            document.getElementById("Smartmetter2").textContent = 0  +' m3';
            document.getElementById("Smartmetter2time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(Smartmetter2, 1000);
            requestAllowed = true; 
        }
    });
}
Smartmetter2();
setInterval(Smartmetter2, 3600000);


function Smartmetter3() {
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
            url: '/getDataSmartmetter-3admin',
            method: 'GET',
            beforeSend: function(){
                document.getElementById("Smartmetter3").textContent = 'Loading data...';
                $('#loading-overlay').hide();
            },
            success: function (dataswm3) {
                // Update the popup content with Laravel controller return value

                document.getElementById("Smartmetter3id").textContent = dataswm3.deviceid ;
                document.getElementById("Smartmetter3").textContent = dataswm3.PositiveCumulativeFlow ;
                $("#Smartmetter3").counter(0);
                document.getElementById("Smartmetter3time").textContent = 'As of: ' +dataswm3.CommunicationTime;
                requestAllowed = true; 
                // console.log('success');
                // alert(dataswm3.PositiveCumulativeFlow);
            },
            error: function (error) {
                document.getElementById("Smartmetter3").textContent = 0 +' m3';
                document.getElementById("Smartmetter3time").textContent = 'As of: Error fetching data' ;
                console.error('Error fetching data:', error);
                setTimeout(Smartmetter3, 1000);
                requestAllowed = true; 
                
                // setInterval(function() {
                    
                // }, 1000); 

            }
        });
}
Smartmetter3();
setInterval(Smartmetter3, 3600000);
function Smartmetter4() {
    if(!requestAllowed) {
        console.log("Requesting data has been stopped due to an earlier error.");
        return;
    }
    $.ajax({
        url: '/getDataSmartmetter-4admin',
        method: 'GET',
        beforeSend: function(){
            document.getElementById("Smartmetter4").textContent = 'Loading data...';
            $('#loading-overlay').hide();
        },
        success: function (dataswm4) {
            document.getElementById("Smartmetter4id").textContent = dataswm4.deviceid ;
            document.getElementById("Smartmetter4").textContent = dataswm4.PositiveCumulativeFlow;

            $("#Smartmetter4").counter(0);
            document.getElementById("Smartmetter4time").textContent = 'As of: ' +dataswm4.CommunicationTime;
            requestAllowed = true; 


        },
        error: function (error) {
            document.getElementById("Smartmetter4").textContent = 0 +' m3';
            document.getElementById("Smartmetter4time").textContent = 'As of: Error fetching data' ;
            console.error('Error fetching data:', error);
            setTimeout(Smartmetter4, 1000);
            requestAllowed = true; 
            

        }
        });
}
Smartmetter4();
setInterval(Smartmetter4, 3600000);