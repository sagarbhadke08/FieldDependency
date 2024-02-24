<!-- search-results.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <?php
        // Include the common database connection file
        include_once('db-connect.php');

        if (isset($_GET["friendName"])) {
            $friendName = $_GET["friendName"];

            // Prepare and execute the SQL query
            $sql = "SELECT * FROM data WHERE Friend = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $friendName);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                include('table-template.php'); 
            } else {
                echo '<p class="alert alert-warning">No results found for Friend: ' . $friendName . '</p>';
            }

            $stmt->close();
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
