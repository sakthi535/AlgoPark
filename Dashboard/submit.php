<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $db = "algoPark";

    // Create connection
    $conn = mysqli_connect($servername, $username, null, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    $userId = $_SESSION["userId"];
    $name = $_GET['name'];
    $type = $_GET['type'];
    $link = $_GET['link'];


    $sql = "insert into tasks values( '$userId', '$type', '$name', '$link', FALSE)";
    $result = mysqli_query($conn, $sql);
    header("Location: ./Dashboard.php")

?>