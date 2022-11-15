<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <script type="text/javascript" src="index.js"></script>

    <title>Document</title>
</head>

<body>

    <h1 style="text-align:center;font-weight:300;">AlgoPark Dashboard</h1>

    <?php

    session_start();
    // include('../session.php');
    if(isset($_SESSION["name"])){
        print_r($_SESSION);
        // header("Location: ../home.html");
    }
    else{

        $_SESSION["name"] = "";
        $_SESSION["userId"] = 0;
        $_SESSION["login"] = false;
    }



    echo "Enter user name : " . $_POST["name"] . "<br>";
    echo "Enter Password : " . $_POST["Password"] . "<br>";

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

    $sql = "select * from login_cred";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $prompt = false;


        while ($row = mysqli_fetch_assoc($result)) {
        
            echo $row["username"] == $_POST["name"];
            echo $row["password"] == $_POST["Password"];

            // echo 
            if($row["username"] == $_POST["name"]){
                echo $row["username"]. "here"; 
                if($row["password"] == base64_encode($_POST["Password"])){

                    $_SESSION["userId"] = $row["userId"];
                    $_SESSION["name"] = $row["username"];
                    $_SESSION["login"] = true;
                    
                    header( 'Location: ../Dashboard/Dashboard.php' );
                    $prompt = true;
                }
                else{
                    echo "<script>Incorrect Credentials !</script>";
                    
                }
            }
            else{
                echo "<script> redirectRegistration(); </script>";
                
            
            }
        
        }
    } else {
        echo "0 results";
    }

    if(!$prompt){
        header( 'Location: form.html' );
    }


    // header( 'Location: Form.html' );

    // header( 'Location: ../Dashboard/Dashboard.html' );
    // echo '<script>window.open("../Dashboard/index.html", "_top")</script>';




    ?>
</body>

</html>