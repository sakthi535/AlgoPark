<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <!-- <script src="index.js"></script> -->
    
    <title>AlgoPark</title>

    <style>
        .column{
            width: 50%;
            text-align: center;
            border: 2px solid;
            height: max(auto, 200px);
            padding: 25px;
            font-family: Rubik;
            font-weight: 300;   
        }
        body{
            padding: 60px;
        }
        *{
            font-weight: 300;
        }

        a{
            text-decoration: none;
        }

        table{
            text-align: center;
            padding: 1px 15% 1px 15%;
            border-spacing: 5px;
            width: 100%;
        }

    </style>

</head>
<body>
        <?php

        function dispColumn($subject, $conn){
            echo "<div class = 'column'>";
            echo "<h1>$subject Course</h1>";
        
            echo "<table id = web>";
        
            $sql = "select * from courses natural join subjects where subjects.subjectName = '$subject'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
    
                while ($row = mysqli_fetch_assoc($result)) {
            
                    $name = $row["courseName"];
                    $link = $row["link"];
                    echo "<tr><td>
                            <a href = '$link'>
                                $name
                            </a>
                            </td></tr>";            
                }
            } else {
                echo "0 results";
            }
            echo "</table>";
            echo "</div>";
        }


        $servername = "localhost";
        $username = "root";
        $db = "algoPark";

        $conn = mysqli_connect($servername, $username, null, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        echo "<div style='display:flex;font-weight: 300;'>";
            
            dispColumn("Web Development", $conn);
            dispColumn("Artificial Intelligence", $conn);
        echo "</div>";


        echo "<div style='display:flex;'>";
            
            dispColumn("Fundamentals", $conn);
            dispColumn("Core", $conn);
        echo "</div>";
    
    ?>
        
    </div>
</body>
</html>