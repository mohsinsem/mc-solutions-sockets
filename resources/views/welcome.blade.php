<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


            @vite('./resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="antialiased">
<button id="ajaxButton">Send AJAX Request</button>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ajaxButton').click(function() {
            $.ajax({
                url: '{{ route('client.load-car-options') }}',
                type: 'POST',
                data: {
                    param1: 'value1',
                    param2: 'value2'
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
