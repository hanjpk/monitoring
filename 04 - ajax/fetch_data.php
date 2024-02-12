<?php
// Include your database connection code here
include 'config/connection.php';

$query = "SELECT timestamp AS waktu, suhu, kelembaban FROM dht11 ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row); // Convert the array to JSON before echoing
} else {
    echo json_encode(["error" => "No data found."]);
}
?>
