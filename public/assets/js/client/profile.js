// script.js
$(document).ready(function() {
    $('#carId').on('change', function() {
        var carId = $(this).val(); // Get the input value
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: routeName,
            type: 'POST',
            data: {
                carId: carId
            },
            success: function(response) {

                $("#carOptId").append(response.html).select2("destroy").select2(
                    {
                        placeholder: 'Select an model'
                    }
                );

            },
            error: function(xhr, status, error) {
                $('#response').html('Error: ' + error);
            }
        });
    });


    $('#carOptId').select2(
        {
            placeholder: 'Select an model'
        }
    );

    var channel = window.channel;
console.log(authId);
    channel.listen('CarOptionsEvent', function(e) {
        console.log('Received CarOptionsEvent:', e.record);
        if(authId != e.record[0]?.customer?.CustomerId){

        showSuccessToast(e.record[0]?.customer?.UserName +' was updated car options!.')
        var tbodyContent = '';
        e.record.forEach(function(item, index) {
             tbodyContent+= '<tr>' +
                '<th scope="row">' + (index + 1) + '</th>' +
                '<td>' + item?.car?.Name + '</td>' +
                '<td>' + item?.car_option[0]?.Name + '</td>' +
                '</tr>';

            // Append each new row to the table body
            $('#addRows tbody').html(tbodyContent);
        });
        }
        // Handle event data as needed
    });
});

