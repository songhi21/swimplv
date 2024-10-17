



$.ajax({
    url: '../displaydatavalue', // Replace with your actual route
    type: 'GET',
    success: function(response) {
        var id = $('#hiddenId').val();
        
        function displayArray(array) {
            // Select the container where the array will be displayed
            var container = $("#arrayContainer");
    
            // Clear the container before displaying the array
            container.empty();
    
            // Iterate over the array elements and append them to the container
            $.each(array, function(index, value) {
                // container.append("<h2>"+value['id']+ id + "</h2>");
                if(value['id'] == id){
                    container.append("<h2>" + value['title'] + "</h2>"+"</br>");
                    container.append("<strong>" + value['location'] + "</strong>");
                    container.append("<p>" + value['description'] + "</p>");
                    container.append("<div style='display: flex; justify-content: flex-end;'><a class='button-49' role='button' href='" + value['link'] + "' download target='_blank'>Download</a></div>");


                }
            
                // console.log(value);
            });
        }
        decodeURI(displayArray(response));
        $('.maps-output').text(id);

    },
    error: function(xhr) {
        // Handle error
        console.log(xhr.responseText);
    }
});