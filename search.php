<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dependency";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the Friend name from the form
    $friendName = $_POST["friendName"];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM data WHERE Friend = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $friendName);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Display the results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["Name"] . "<br>";
            echo "City: " . $row["City"] . "<br>";
            echo "Friend: " . $row["Friend"] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No results found for Friend: " . $friendName;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
