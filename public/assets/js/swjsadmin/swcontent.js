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
        "url": "/getDataswdevicelist-admin",
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
            // alert();
            return data;
            
        },
        "error": function(xhr, error, thrown) {
            console.error('DataTables Ajax error:', error);
            alert('An error occurred while fetching data. Please try again later.');
            setTimeout(function() {
                table.ajax.reload();
            }, 1000);
            $('.loading-overlay').hide();
            
        }
    },
    "columns": [
        { "data": null, "defaultContent": '<input type="checkbox" class="row-checkbox">' },
        { "data": "id" },
        { "data": "devicename" },
        { "data": "PositiveCumulativeFlow"},
        // { "data": "PositiveInstantaneousFlow" },
        // { "data": "AntiCumulativeFlow" },
        // { "data": "AntiInstantaneousFlow" },
        { "data": "CommunicationTime" },
        { "data": "ValveStatus" },
        { "data": "MeterVoltage" },
        { "data": "SignalIntensity" },
        { "data": "PipelinePressure" },
        // { 
        //     "data": null,
        //     "render": function(data, type, row) {
        //         return "<a href='smartwatermeter/" + row.id + "' class='btn btn-primary'>Check</a>";
        //     }
        // }
            
    ]
});

$('#selectAll').on('change', function() {
    $('.row-checkbox').prop('checked', $(this).prop('checked'));
    // alert();
});

// Export selected rows to Excel
$('#exportExcel').on('click', function() {
    var selectedRowsData = [];
    $('.row-checkbox:checked').each(function() {
        var rowData = table.row($(this).closest('tr')).data(); // Get data for the selected row
        selectedRowsData.push(rowData);
    });

    if (selectedRowsData.length > 0) {
        var header = ['DeviceId', 'DeviceName','PositiveCumulativeFlow', 'CommunicationTime', 'ValveStatus', 'MeterVoltage', 'SignalIntensity', 'PipelinePressure'];
        var wsData = [header];
        selectedRowsData.forEach(function(row) {
            var rowData = [
                row.id,
                row.devicename,
                row.PositiveCumulativeFlow,
                row.CommunicationTime,
                row.ValveStatus,
                row.MeterVoltage,
                row.SignalIntensity,
                row.PipelinePressure
            ];
            wsData.push(rowData);
        });

        var ws = XLSX.utils.aoa_to_sheet(wsData);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        XLSX.writeFile(wb, "Smartwatermeterdevicelist.xlsx");
    } else {
        alert('No rows selected for export.');
    }
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

$('#result').on('length.dt draw.dt', function(e, settings, len) {
    // Reset the count to 0 when the length changes
    $('#checkboxCount').text('0');
    $('#selectAll').prop('checked', false);
    $('.row-checkbox').prop('checked', false);

    
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
$('#loading-overlay').hide();
// Highlight selected rows
// $('#result tbody').on('click', 'tr', function() {
//     $(this).toggleClass('selected');
// });


