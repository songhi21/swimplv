var table;


table = $('#result').DataTable({
    "scrollX": true,
    "paging": true,
    "pagingType": "full_numbers",
    "pageLength": 5,
    "lengthChange": true,
    "columnDefs": [
        // { "orderable": false, "targets": [0, -1] }
        { "orderable": false, "targets": "_all" }
    ],
    "searching": false, // Disable searching
    "processing": true,
    "serverSide": true,
    "language": {
        "processing": "Loading data...",
    },
    "ajax": {
        "url": "/getDatapsdevicelist-admin",
        "type": "GET", // Or "POST" depending on your server configuration
        "dataType": "json",
        "dataSrc": function(response) {
            
            var data = [];
            // Iterate over each object in the response
            $.each(response.data, function(key, value) {
                // Push the object value (the actual data) to the array
                data.push(value);
                // console.log(value['id']);
            });
            $('.loading-overlay').hide();
            return data;
            
        },
        "error": function(xhr, error, thrown) {
            $('.loading-overlay').hide();
            console.error('DataTables Ajax error:', error);
            setTimeout(function() {
                table.ajax.reload();
            }, 1000);
            alert('An error occurred while fetching data.');
            
        }
    },
    "columns": [
        { "data": null, "defaultContent": '<input type="checkbox" class="row-checkbox">' },
        // { "data": function(row) {
        //     // Use the first-level key as the ID
        //     return Object.keys(row)[0];
        //   }
        // },
        { "data": "id" },
        { "data": "devicename" },
        { "data": null, "defaultContent": "4G" },
        { "data": "Devicetype" },
        { 
            "data": "status",
            "render": function(data) {
                return data === "在线" ? "online" : "offline";
            }
        },
        { "data": "receiveTime" },
        { "data": "currentValue" },
        { "data": "rssi" },
        { "data": "power" },
        // { "data": null, "defaultContent": "<a href='pressuresensordevice/{id}' class='btn btn-primary'>Check</a>" },
        // {"data": "id",
        //     "defaultContent": function(data) {
        //         return "<a href='pressuresensordevice/" + data.id + "' class='btn btn-primary'>Check</a>";
        //     }
        // }
        { 
            "data": null,
            "render": function(data, type, row) {
                return "<a href='pressuresensordevice/" + row.id + "' class='btn btn-primary'>Check</a>";
            }
        }
            
    ]
});

// Reload data if an error occurs
// $('#result').on('error.dt', function(e, settings, techNote, message) {
    
// });

$('#selectAll').on('change', function() {
    $('.row-checkbox').prop('checked', $(this).prop('checked'));
    if($(this).prop('checked')){
        var count = $('.row-checkbox:checked').length;
        $('#checkboxCount').text(count);
    }
    else{
        $('#checkboxCount').text('0');
    }
});

// Export selected rows to Excel
$('#exportExcel').on('click', function() {
    var selectedRowsData = [];
    $('.row-checkbox:checked').each(function() {
        var rowData = table.row($(this).closest('tr')).data(); // Get data for the selected row
        selectedRowsData.push(rowData);
    });

    if (selectedRowsData.length > 0) {
        var header = ['DeviceId', 'NetworkType', 'Equipmenttype', 'Onlinestatus', 'Updatetime', 'Measurements', 'SignalStrength', 'BatteryVoltage'];
        var wsData = [header];
        selectedRowsData.forEach(function(row) {
            var rowData = [
                row.id,
                '4G', // Assuming 'NetworkType' is static
                row.Devicetype,
                row.status === '在线' ? 'online' : 'offline', // Mapping status values
                row.receiveTime,
                row.currentValue,
                row.rssi,
                row.power
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

// Event handler for length and draw events of the DataTable
$('#result').on('length.dt draw.dt', function(e, settings, len) {
    // Reset the count to 0 when the length changes
    $('#checkboxCount').text('0'); // Set the count to 0
    $('#selectAll').prop('checked', false); // Uncheck the "Select All" checkbox
    $('.row-checkbox').prop('checked', false); // Uncheck all row checkboxes
});

// Event listener for changes in row checkboxes
$(document).on('change', '.row-checkbox', function() {
    var isChecked = $(this).prop('checked'); // Check if the checkbox is checked
    var count = $('.row-checkbox:checked').length; // Count the number of checked row checkboxes
    if (isChecked) {
        $('#checkboxCount').text(count); // Update the count if the checkbox is checked
    } else {
        $('#checkboxCount').text($('.row-checkbox:checked').length); // Update the count if the checkbox is unchecked
    }
});

$('#loading-overlay').hide();
// Highlight selected rows
// $('#result tbody').on('click', 'tr', function() {
//     $(this).toggleClass('selected');
// });


