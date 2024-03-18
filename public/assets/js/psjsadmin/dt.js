var table;


table = $('#result').DataTable({
    "scrollX": true,
    "paging": true,
    "pagingType": "full_numbers",
    "pageLength": 5,
    "lengthChange": true,
    "columnDefs": [
        // { "orderable": false, "targets": [0, -1] }
        { "orderable": false, "searchable": true, "targets": "_all" }
    ],
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
            console.error('DataTables Ajax error:', error);
            alert('An error occurred while fetching data. Please try again later.');
            $('.loading-overlay').hide();
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
// Enable searching for all columns
$('#dt-search-0').on('keyup', function() {
    var keyword = $(this).val().toLowerCase();
    table.search(keyword).draw();
    console.log(keyword);
});





// table = $('#result').DataTable({
//     "scrollX": true,
//     "paging": true, // Enable pagination
//     "pagingType": "full_numbers", // Show pagination with first, last, previous, and next buttons
//     "lengthChange": false, 
//     "columnDefs": [
//         { "orderable": false, "targets": [0, -1] }
//     ],
//     "pageLength": 2,
//     "processing": true, // Enable DataTables processing indicator
//     "language": {
//                 "processing": "Loading data..." // Custom loading message
//     },
//     "ajax": {
//         "url": "/getDatapsdevicelist-admin",
        
//         "dataSrc": function(result) {

//             $.each(result, function(key, value) {
//                 var rowData = [
//                     '<input type="checkbox" class="row-checkbox">',
//                     `${value['id']}`, // ID
//                     `4G`, // Network Type (static value "4G")
//                     `${value['Devicetype']}`, // Equipment type
//                     `${value['status'] == '在线' ? 'online' : 'offline'}`, // Online status
//                     `${value['receiveTime']}`, // Update time
//                     `${value['currentValue']}`, // Measurements
//                     `${value['rssi']}`, // Signal Strength
//                     `${value['power']}`, // Battery Voltage
//                     '<a href="#" class="btn btn-primary btn-block">Check</a>' // Action button
//                 ];

//                 // Add the row to the DataTable
//                 table.row.add(rowData);
//             });

//             // Update any other UI elements or perform additional tasks as needed
//             // $("#totaldevices").empty().append(`<h4> Total number of Devices: ${pressureSensorCount} </h4>`);
//             // $("#totalonline").empty().append(`<h4> Number of Online Devices: ${totalonline} </h4>`);

//             return result; // Return the data to DataTables
//         },
//         "error": function(xhr, error, thrown) {
//             console.error('DataTables Ajax error:', error);
//             alert('An error occurred while fetching data. Please try again later.');
//         }
//     }
    
// });
// Fetch data via AJAX and populate DataTable

// Select/Deselect all checkboxes
$('#selectAll').on('change', function() {
    $('.row-checkbox').prop('checked', $(this).prop('checked'));
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


// Highlight selected rows
// $('#result tbody').on('click', 'tr', function() {
//     $(this).toggleClass('selected');
// });


