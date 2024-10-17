$(document).ready(function() {
    var idps = $('#hiddenId').val();

    var table2 = $('#devhistory-tablegwmw').DataTable({
        "scrollX": true,
        "paging": true,
        "pagingType": "full_numbers",
        "pageLength": 10,
        "lengthChange": true,
        "columnDefs": [
            { "orderable": false, "targets": "_all" }
        ],
        "searching": false,
        "processing": true,
        "serverSide": true,
        "language": {
            "processing": "Loading data...",
        },
        "ajax": {
            "url": "/groundwatermonitoringwell-admin/" + idps,
            "type": "GET",
            "data": function (d) {
                d.start_date = $('#start').val();
                d.end_date = $('#end').val();
            },
            "dataSrc": "data", // No wrapping object
            "error": function(xhr, error, thrown) {
                console.error('DataTables Ajax error:', error);
                setTimeout(function() {
                    table2.ajax.reload();
                }, 5000);
                alert('An error occurred while fetching data.');
            }
        },
        "columns": [
            {
                "data": null,
                "defaultContent": '<input type="checkbox" class="row-checkbox">'
            },
            { "data": "deviceid" },
            { "data": "devicename" }, 
            { "data": "val" },
            { "data": "addTime" }
        ],
    });
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Groundwater Monitoring Well"
            },
            axisX: {
                valueFormatString: "DDD",
                interval: 1,
                intervalType: "day"
            },
            axisY: {
                includeZero: false
            },
            data: [
                {
                    type: "line",
                    dataPoints: [] // Initialize empty dataPoints array
                }
            ]
        });
    
        // Update chart with DataTable data
        function updateChartWithDataTableData() {
            var data = table2.rows().data();
            
            var chartData = [];
            data.each(function (row) {
                // Ensure that addTime field is in the format "YYYY-MM-DDTHH:MM:SS"
                var date = new Date(row.addTime); // Parse date string to JavaScript Date object
            
                // Ensure that val contains numeric values
                var value = parseFloat(row.val); // Convert val to floating point number
                chartData.push({
                    x: date,
                    y: value
                });
            });
            chart.options.data[0].dataPoints = chartData;
            chart.render();
        }
    
        // Initial update when page loads
        updateChartWithDataTableData();
    
        // Update chart when DataTable is drawn (after AJAX call completes)
        $('#devhistory-tablegwmw').on('draw.dt', function () {
            updateChartWithDataTableData();
        });
    }
    

    $('#btnSubmit').on('click', function() {
        
        var startDate = $('#start').val();
        var startDateT = startDate.replace('T', ' ');
        var endDate = $('#end').val();
        var endDateT = endDate.replace('T', ' ');
        // Reload DataTable with new date range
        table2.ajax.url("/groundwatermonitoringwell-admin/" + idps + "?date_start=" + startDateT+":00" + "&date_end=" + endDateT+":00").load();

        $('#checkboxCount').text('0');
        $('#selectAll').prop('checked', false);
        $('.row-checkbox').prop('checked', false);
    });

    $('#selectAll').on('change', function() {

        
        // Display the count in the span element
        $('.row-checkbox').prop('checked', $(this).prop('checked'));
        
        if($(this).prop('checked')){
            var count = $('.row-checkbox:checked').length;
            $('#checkboxCount').text(count);
        }
        else{
            $('#checkboxCount').text('0');
        }
        // Check or uncheck all checkboxes based on the state of selectAll checkbox
    
    });
    $('#devhistory-tablegwmw').on('length.dt draw.dt', function(e, settings, len) {
        // Reset the count to 0 when the length changes
        $('#checkboxCount').text('0');
        $('#selectAll').prop('checked', false);
        $('.row-checkbox').prop('checked', false);

        
    });
    $('#exportExcel').on('click', function() {
        var selectedRowsData = [];
        $('.row-checkbox:checked').each(function() {
            var rowData = table2.row($(this).closest('tr')).data();
            selectedRowsData.push(rowData);
        });

        if (selectedRowsData.length > 0) {
            var header = ['DeviceId','DeviceName', 'Value', 'Date and Time']; // Adjust headers accordingly
            var wsData = [header];
            selectedRowsData.forEach(function(row) {
                var rowData = [
                    row.deviceid,
                    row.devicename,
                    row.val,
                    row.addTime,
                    // Add more fields if needed
                ];
                wsData.push(rowData);
            });

            var ws = XLSX.utils.aoa_to_sheet(wsData);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, "Pressuresensor.xlsx");
        } else {
            alert('No rows selected for export.');
        }
    });


    
});
$(document).on('change', '.row-checkbox', function() {
    var isChecked = $(this).prop('checked');
    var count = $('.row-checkbox:checked').length;
    if (isChecked) {
        
        $('#checkboxCount').text(count);
    } else {
        $('#checkboxCount').text($('.row-checkbox:checked').length);
    }
});

// default date and time-----------------------
$(document).ready( function(){
    // Get current date in Philippine time
var today = new Date();
today.setHours(today.getHours() + 8); // Add 8 hours for Philippine time

// Calculate start of the current month in Philippine time
var startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
startOfMonth.setHours(startOfMonth.getHours() + 8); // Add 8 hours for Philippine time
var startOfMonthString = formatDate(startOfMonth); // Format the date

// Format end of today in Philippine time
var endOfToday = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1);
endOfToday.setHours(endOfToday.getHours() + 8); // Add 8 hours for Philippine time
var endOfTodayString = formatDate(endOfToday); // Format the date

// Set default values for start and end inputs
document.getElementById('start').value = startOfMonthString;
document.getElementById('end').value = endOfTodayString;

// Event listener for the submit button
document.getElementById('btnSubmit').addEventListener('click', function() {
    // Get the value of the start date and time input field
    var startDate = document.getElementById('start').value;
    // Replace the "T" with a space
    startDate = startDate.replace('T', ' ');

    // Get the value of the end date and time input field
    var endDate = document.getElementById('end').value;
    // Replace the "T" with a space
    endDate = endDate.replace('T', ' ');

    // Use startDate and endDate for further processing or submitting to the server
});

// Function to format date to "YYYY-MM-DDTHH:MM:SS.SSS" format
function formatDate(date) {
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);
    var hours = ('0' + date.getHours()).slice(-2);
    var minutes = ('0' + date.getMinutes()).slice(-2);
    var seconds = ('0' + date.getSeconds()).slice(-2);
    var milliseconds = ('00' + date.getMilliseconds()).slice(-3); // Get milliseconds with leading zeros
    return year + '-' + month + '-' + day + 'T' + hours + ':' + minutes + ':' + seconds + '.' + milliseconds;
}
$('#loading-overlay').hide();
}

);



