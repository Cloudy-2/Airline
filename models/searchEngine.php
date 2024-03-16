<?php
    // Include the database connection file
    include('../config/database.php');   

    // Check if the database connection is established
    if ($conn) {
        // Check if the form has been submitted
        if(isset($_GET['from']) && isset($_GET['to'])) {
            // Fetch search parameters from the form
            $from = $_GET['from'];
            $to = $_GET['to'];

            // SQL query to search for flights
            $sql = "SELECT * FROM ph_airline WHERE PH_Airline  AND AP_arrival ";
            $result = $conn->query($sql);

            // Check if any flights were found
            if ($result->num_rows > 0) {
                // Output table header
                echo "<table>";
                echo "<tr><th>Flight Number</th><th>Departure</th><th>Arrival</th><th>Price</th><th>Book</th></tr>";

                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Id"] . "</td>";
                    echo "<td>" . $row["PH_Airline"] . "</td>";
                    echo "<td>" . $row["AP_arrival"] . "</td>";
                   
                }

                echo "</table>";
            } else {
                echo "No flights found.";
            }
        }
        // Close the database connection
        $conn->close();
    } else {
        echo "Failed to connect to the database.";
    }
?>
