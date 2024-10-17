$(document).ready(function() {
    var table = $('#result').DataTable({
        "scrollX": true,
        "paging": true,
        "pagingType": "full_numbers",
        "pageLength": 10,
        "lengthChange": true,
        "columnDefs": [
            { "orderable": false, "targets": [0, -1] } // Disable sorting for checkbox and action column
        ],
        "searching": false, // Disable searching
        "processing": true,
        "serverSide": true,
        "language": {
            "processing": "Loading data..."
        },
        "ajax": {
            "url": "/getallwellsensors",
            "type": "GET",
            "dataType": "json",
            "dataSrc": function(response) {
                return response.data; // Assuming the data is directly under 'data' key
            },
            "error": function(xhr, error, thrown) {
                console.error('DataTables Ajax error:', error);
                alert('An error occurred while fetching data.');
            }
        },
        "columns": [
            { "data": null, "defaultContent": '<input type="checkbox" class="row-checkbox">' }, // Checkbox column
            { "data": "id" }, // Use 'id' instead of 'DeviceId'
            { "data": "sensorName" }, // Use 'sensorName' instead of 'DeviceName'
            { "data": "unit" }, // Use 'unit' instead of 'DeviceUnit'
            { "data": "updateDate" }, // Use 'updateDate' instead of 'Updatetime'
            { "data": "value" }, // Use 'value' instead of 'Value'
            { 
                "data": null,
                "render": function(data, type, row) {
                    return "<a href='groundwatermonitoringwell/" + row.id + "' class='btn btn-primary'>Check</a>";
                }
            }
        ]
    });

    // Select all checkboxes
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
            var header = ['id', 'sensorName', 'unit', 'updateDate', 'value']; // Use column names consistently
            var wsData = [header];
            selectedRowsData.forEach(function(row) {
                var rowData = [
                    row.id,
                    row.sensorName,
                    row.unit,
                    row.updateDate,
                    row.value
                ];
                wsData.push(rowData);
            });

            var ws = XLSX.utils.aoa_to_sheet(wsData);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, "SensorData.xlsx");
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
        $('#checkboxCount').text(count); // Update the count
    });

    // Event listener for changes in "Select All" checkbox
    $('#selectAll').on('change', function() {
        var isChecked = $(this).prop('checked'); // Check if the "Select All" checkbox is checked
        $('.row-checkbox').prop('checked', isChecked); // Check or uncheck all row checkboxes based on the state of "Select All"
        $('#checkboxCount').text($('.row-checkbox:checked').length); // Update the count
    });
});
