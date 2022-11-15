<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
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
    
        $userId = uniqid();
        $name = $_POST['name'];
        $pass = base64_encode($_POST['Password']);

        $sql = "insert into login_cred values( '$userId', '$name', '$pass')";
        $result = mysqli_query($conn, $sql);
    
        header( 'Location: form.html' );
    
    
    
    ?>

    
</body>
</html>