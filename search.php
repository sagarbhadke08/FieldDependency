<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dependency";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET["friendName"])) {
   
    $friendName = $_GET["friendName"];

    $sql = "SELECT * FROM data WHERE Friend = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $friendName);
    $stmt->execute();


    $result = $stmt->get_result();


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

    $stmt->close();
    $conn->close();
}
?>
