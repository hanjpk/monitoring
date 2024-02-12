<?php
// Include your connection.php to use the established connection
include 'config/connection.php';

// Prepare the SQL query to select the latest timestamp, suhu, and kelembaban
$query = "SELECT timestamp AS waktu, suhu, kelembaban FROM dht11 ORDER BY timestamp DESC LIMIT 1";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if we got a result
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Define your variables
    $waktu = $row['waktu'];
    $suhu = $row['suhu'];
    $kelembaban = $row['kelembaban'];

    // Example usage of the variables
    echo "Waktu: " . $waktu . "<br>";
    echo "Suhu: " . $suhu . "°C<br>";
    echo "Kelembaban: " . $kelembaban . "%<br>";
} else {
    echo "No data found.";
}

// Close the connection
mysqli_close($conn);
?>
