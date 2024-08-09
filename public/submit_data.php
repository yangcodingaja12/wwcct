<?php
// Database credentials
$servername = "localhost";
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "wwcct";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all required parameters are set
if (isset($_GET['distance1']) && isset($_GET['distance2']) && isset($_GET['distance3']) && isset($_GET['weight'])) {
    $distance1 = $_GET['distance1'];
    $distance2 = $_GET['distance2'];
    $distance3 = $_GET['distance3'];
    $weight = $_GET['weight'];

    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO sementara (data_sensor, data_sensor2, data_sensor3, data_sensor4 waktu) VALUES (?, ?, NOW())");
    $stmt->bind_param("dd", $distance1, $distance2, $distance3, $weight);  // Assuming data_sensor and data_sensor2 are numeric (floats/doubles)

    // Execute the query
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Missing parameters";
}

$conn->close();