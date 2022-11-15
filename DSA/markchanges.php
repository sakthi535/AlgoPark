<?php
    session_start();


    $servername = "localhost";
    $username = "root";
    $db = "algoPark";

    $conn = mysqli_connect($servername, $username, null, $db);
    

    $userId = $_SESSION["userId"]; 

    // echo $_SESSION["userId"]."<br>";

    foreach($_GET["solved"] as $selected){
        $sql = "insert into problemssolved values( '$userId', '$selected')";
        $result = mysqli_query($conn, $sql);
    }

    header('Location: ./dsa.php');





?>