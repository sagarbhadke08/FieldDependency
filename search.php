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
function kthSmallest(arr, l, r, k) {
    // Function to perform QuickSort on the array
    function quickSort(arr, l, r) {
        if (l < r) {
            // Partition the array
            let pi = partition(arr, l, r);

            // Recursively sort elements before and after partition
            quickSort(arr, l, pi - 1);
            quickSort(arr, pi + 1, r);
        }
    }

    // Function to partition the array
    function partition(arr, l, r) {
        let pivot = arr[r]; // Pivot element
        let i = l - 1; // Index of smaller element

        for (let j = l; j < r; j++) {
            // If the current element is smaller than or equal to the pivot
            if (arr[j] <= pivot) {
                i++; // Increment the index of the smaller element
                // Swap arr[i] and arr[j]
                let temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }

        // Swap arr[i+1] and arr[r] (or pivot)
        let temp = arr[i + 1];
        arr[i + 1] = arr[r];
        arr[r] = temp;

        return i + 1;
    }

    // Perform QuickSort on the array
    quickSort(arr, l, r);

    // Return the kth smallest element
    return arr[l + k - 1];
}

// Example usage:
let arr1 = [7, 10, 4, 3, 20, 15];
let k1 = 3;
console.log(kthSmallest(arr1, 0, arr1.length - 1, k1)); // Output: 7

let arr2 = [7, 10, 4, 20, 15];
let k2 = 4;
console.log(kthSmallest(arr2, 0, arr2.length - 1, k2)); // Output: 15
