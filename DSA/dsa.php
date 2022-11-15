<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <style>
        * {
            background-color: #B1E1FF;
            font-family: Rubik;
            font-weight: 300;
        }

        h1 {
            text-align: center;
        }

        .headRow {
            font-size: larger;
        }

        table {
            text-align: center;
            width: 100%;
            padding: 25px;
            border-spacing: 10px;
        }

        a {
            text-decoration: none;
        }


        *{
            font-family: rubik;
        }

        .button{
            text-align: center;
            width: 40%;
            border: 2px solid #A66CFF;
            padding: 18px;
            font-family: rubik,sans-serif;
            cursor: pointer;
            text-transform: uppercase;
            background: #A66CFF;
            color: #B1E1FF;
            
        }


        .button:hover{
            border: 2px solid #A66CFF;
            background: #B1E1FF;
            color: #A66CFF;
        }



    </style>


    <form action="markchanges.php" name="markchanges">


    <table>
        <tbody>


            <?php

            // include('../session.php');
            session_start();
            // print_r($_SESSION);


            if(isset($_SESSION['login'])){
                if($_SESSION["login"] == false){
                    header("Location : ../homePage.html");
               
                 }
            }
            else{
                header("Location : ../homePage.html");

            }


            // error_reporting(0);

            $servername = "localhost";
            $username = "root";
            $db = "algoPark";

            $conn = mysqli_connect($servername, $username, null, $db);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $input = isset($_GET["submit"]) ? $_GET["submit"] : "Arrays and Strings";

            echo "<h1>Practise $input</h1>";

            if($input == "add"){
                header("Location: ./addProblem.php");
            }

            $userId = $_SESSION['userId'];

            $sql = "select quesId from problemssolved where userId = '$userId'";
            $res = mysqli_query($conn, $sql);
            $solvedByUser = array();
            
            while($row = mysqli_fetch_row($res)){
                array_push($solvedByUser, $row[0]);
            }

            // print_r($solvedByUser);



            $sql = "select * from dstopic natural join dsquestions where dstopic.topicName = '$input'";
            $result = mysqli_query($conn, $sql);
            $itr = 0;


            if (mysqli_num_rows($result) > 0) {
                $prompt = false;


                while ($row = mysqli_fetch_assoc($result)) {

                    $name = $row["quesName"];
                    $link = $row["link"];
                    // $sub = $row["subjectName"];
                    $itr += 1;

                    if(in_array($row['quesId'], $solvedByUser)){
                        echo "<tr style='text-decoration: line-through;'>";

                    }
                    else{
                        echo "<tr>";

                    }

                    echo "<td>$itr</td><td>$name</td><td>NIL</td><td>Not Started</td><td>
                        <a href = '$link' target='_blank'>
                            $link
                        </a>
                        </td>
                        <td>
                            <input type='checkbox' name='solved[]' value='$row[quesId]'>
                        </td>
                        
                        
                        </tr>";
                }
            } else {
                echo "0 results";
            }

            ?>
            

        </tbody>
    </table>

    <div style="text-align: center;">
        <button class="button" type="submit" for="markchanges">
            Save Changes
        </button>
    </div>

    </form>

</body>

</html>