<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="index.css">

    <title>Document</title>
</head>

<body>

    <h1> <?php 
    error_reporting(0);
    echo "Learn ".(isset($_GET['submit']) ? $_GET['submit'] : 'Core')." Subjects ";?></h1>

    <center>
  
        <table>
            <tbody>
                
        <?php
        error_reporting(0);

        $servername = "localhost";
        $username = "root";
        $db = "algoPark";
    
        $conn = mysqli_connect($servername, $username, null, $db);
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $input = isset($_GET["submit"]) ? $_GET["submit"] : "Core";
            
        $sql = "select * from courses natural join subjects where subjects.subjectName = '$input'";
        $result = mysqli_query($conn, $sql);
        $itr=0;
    
        if (mysqli_num_rows($result) > 0) {
            $prompt = false;
    
    
            while ($row = mysqli_fetch_assoc($result)) {
            
                $name = $row["courseName"];
                $link = $row["link"];
                $sub = $row["subjectName"];
                $itr +=1;

                echo "<tr><td>$itr</td><td>$name</td><td>Not Started</td><td><a href = '$link' target=_blank>link</a></td></tr>";            
            }
        } else {
            echo "0 results";
        }
        
        ?>
            </tbody>
        </table>




    </center>

    <h1>

</body>

</html>