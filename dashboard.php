<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Dashboard</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="dash.css">
    <style>
     

        
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Airlines PH</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="mainmenu.php">Home</a></li>
            <li><a href="#">Flights</a></li>
            <li><a href="#">Bookings</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>
   <div class="container">
        <h1>Search Flights</h1>

        <!-- Flight search form -->
        <form id="flight-search-form">
            <label for="from" style="color: white;">From:</label>
            <input type="text" id="from" name="from" placeholder="Airport or City" required>
            <label for="to" style="color: white;">To:</label>
            <input type="text" id="to" name="to" placeholder="Airport or City" required>
            <label for="date" style="color: white;">Date:</label>
            <input type="date" id="date" name="date" required>
            <button type="button" id="search-button">Search Flights</button>
        </form>

        <!-- Display search results -->
        <h2 id="search-results-title" style="color: white;">Available Flights</h2>
        <div class="search-results" id="search-results">
        </div>
        

    <!-- Add jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
         $(document).ready(function() {
            // When the search button is clicked
            $('#search-button').click(function() {
                // Get form data
                var formData = $('#flight-search-form').serialize();

                // Send AJAX request to searchEngine.php
                $.ajax({
                    url: './models/searchEngine.php',
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        // Display search results in the designated container
                        $('#search-results').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        $(document).ready(function() {
        // When the search button is clicked
        $('#search-button').click(function() {
            // Get form data
            var formData = $('#flight-search-form').serialize();

            // Send AJAX request to searchEngine.php
            $.ajax({
                url: '../models/searchEngine.php',
                type: 'GET',
                data: formData,
                success: function(response) {
                    // Display search results in the designated container
                    $('#search-results').html(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });

        // When the "Book Now" button is clicked
        $(document).on('click', '.book-now-button', function() {
            var flightId = $(this).data('flight-id');
            // Perform the booking action here (e.g., redirect to booking page with flight ID)
            alert('Flight with ID ' + flightId + ' has been booked!');
        });
    });
    document.getElementById('from').addEventListener('click', function() {
  document.getElementById('flightDetails').style.display = 'block';
});

    // Get references to the textarea and container
    var fromTextArea = document.getElementById('from');
    var dataContainer = document.getElementById('dataContainer');

    // Show container when textarea is clicked
    fromTextArea.addEventListener('click', function() {
        dataContainer.style.display = 'block';
    });

    </script>
</body>
</html>
