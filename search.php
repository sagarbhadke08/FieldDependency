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
    function quickSort(arr, l, r) {
        if (l < r) {
            let pi = partition(arr, l, r);
            quickSort(arr, l, pi - 1);
            quickSort(arr, pi + 1, r);
        }
    }

   
    function partition(arr, l, r) {
        let pivot = arr[r]; 
        let i = l - 1; 

        for (let j = l; j < r; j++) {
           
            if (arr[j] <= pivot) {
                i++; 
             
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

    
    quickSort(arr, l, r);

   
    return arr[l + k - 1];
}


let arr1 = [7, 10, 4, 3, 20, 15];
let k1 = 3;
console.log(kthSmallest(arr1, 0, arr1.length - 1, k1)); // Output: 7

let arr2 = [7, 10, 4, 20, 15];
let k2 = 4;
console.log(kthSmallest(arr2, 0, arr2.length - 1, k2)); // Output: 15
