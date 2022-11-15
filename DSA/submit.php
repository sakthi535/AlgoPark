<?php

    $pname = $_REQUEST["problemName"];
    $pTopic = $_REQUEST["problemTopic"];
    $link = $_REQUEST["link"];
    $rating = $_REQUEST["rating"];


    $servername = "localhost";
    $username = "root";
    $db = "algoPark";

    // Create connection
    $conn = mysqli_connect($servername, $username, null, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
    



    $sql = "select max(quesId) from dsquestions;";
    $result = mysqli_query($conn, $sql);
    $id = ((mysqli_fetch_assoc($result)["max(quesId)"]));
    
    $prompt = true;

    // echo $pTopic;
    $sql = "select * from dstopic";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if($row["topicName"] == $pTopic){
            $prompt = false;
            $topicId = $row["topicId"];
        }
    
    }

    if($prompt){
        echo "<script> alert('Please enter a valid topic from sidebar');</script>";
        header("Location : addProblem.php");
    }

    echo $topicId;


    $sql = "insert into dsquestions values( $id+1, '$topicId', '$pname', '$link', '$rating')";
    $result = mysqli_query($conn, $sql);



    header( 'Location: dsa.php' );
    


?>