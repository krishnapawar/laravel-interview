<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
        <script>
            // $(function() {
            //     $(".unstyled").sortable({ opacity: 0.6, cursor: 'move', update: function() {
            //         var order = $(this).sortable("serialize") + '&action=updateRecordsListings'+'&_token={{csrf_token()}}'; 
            //         // console.log("updateRecordsListings=>",order);
            //         $.post("/updateRecordsListings", order, function(theResponse){}); 
            //     }
            //     });
            // });

            
        </script>
         <script>
            $(function () {
                // Make the table sortable
                $('#sortable').sortable({
                    update: function (event, ui) {
                        // Create an array of record IDs in the new order
                        let recordsArray = $(this).sortable('toArray').map(function (id) {
                            return id.split('_')[1]; // Extract the ID number from 'recordsArray_#'
                        });
    
                        // Send an AJAX request to update the order
                        $.ajax({
                            url: '{{ route("updateRecordsListings") }}', // Update the route name as needed
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                recordsArray: recordsArray
                            },
                            success: function (response) {
                                alert('Positions updated successfully');
                            },
                            error: function (xhr, status, error) {
                                console.error('Error:', error);
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
