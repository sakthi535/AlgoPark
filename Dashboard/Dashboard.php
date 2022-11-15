<!DOCTYPE html>
<html lang="en" style="background-color: rgb(177, 225, 255); padding: 25px 150px 0px 150px;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./Dashboard.css">

    <title>Document</title>
</head>
<div >

    <?php
        session_start();
        // error_reporting(0);
        // print_r($_SESSION["name"]);
        if(!isset($_SESSION["name"])){
            echo "not here";
            header('Location: ../LoginPage/Form.html');
        }
        echo "User Id : ".$_SESSION["userId"];


        $user = $_SESSION["name"];
        $id = $_SESSION["userId"];


        $servername = "localhost";
        $username = "root";
        $db = "algoPark";

        $count =0;
        $conn = mysqli_connect($servername, $username, null, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // }
        $userId = 1;

        $sql = "select * from tasks where userId = '$id'";
        $result = mysqli_query($conn, $sql);
        
        $sql = "select count(*) from problemssolved where userId = '$id'";
        $countQuery = mysqli_query($conn, $sql);
        $countProb = (mysqli_fetch_row($countQuery));
        // echo $countProb[0];

        
    
    ?>    

    <script>
        $(document).ready(function() {
            console.log("hello")
            $('.button-x').click(function() {

                console.log((this.parentElement).parentElement.style.textDecoration)
                if ((this.parentElement).parentElement.style.textDecoration == 'line-through') {
                    (this.parentElement).parentElement.style.textDecoration = 'none'
                } else {
                    (this.parentElement).parentElement.style.textDecoration = 'line-through'
                }
            });
        });


        function takeinput() {
            console.log(document.getElementById("taskInput"))
            document.getElementById("taskInput").style.display = "revert";
            document.getElementById("taskSubmit").style.display = "revert";

        }
    </script>




    <div class="progress">

        <h1>Hello, <?php echo $user; ?></h1>


        <div style="display: flex;">
            <button class="button">
                Problems
            </button>

            <button class="button">
                Lectures
            </button>

            <button class="button">
                Challenges
            </button>
        </div>

        <div id="content">
            <div style="display: flex;">

                <div class="block">

                    <h1 style="font-size: 75px;"><?php echo $countProb[0];?></h1>
                    Problems Solved

                </div>

                <div class="block">

                    <h1 style="font-size: 75px;"><?php echo mysqli_num_rows($result);?></h1>
                    Tasks in TODO

                </div>

                <div class="block">

                    <h1 style="font-size: 75px;">5/26</h1>
                    Topics Covered

                </div>
            </div>


        </div>

    </div>

    <div style="display: flex;padding-top:30px">

        <div class="column">
            <h1>Tasks</h1>
            <table>

                <tr>
                    <th>
                        Type
                    </th>
                    <th>
                        Name
                    </th>

                    <th>
                        Status
                    </th>
                    <th>
                        Link
                    </th>

                    <th>
                        Mark
                    </th>
                </tr>


                <?php
                


                if (mysqli_num_rows($result) > 0) {
                    $prompt = false;


                    while ($row = mysqli_fetch_assoc($result)) {

                        $type = ($row["taskType"]);
                        $name = $row["taskName"];

                        $link = $row["taskLink"];
                        // $sub = $row["subjectName"];
                        $count += 1;

                        echo "<tr><td>$type</td><td>$name</td><td>Not Started</td><td>
                                <a href = '$link' target='_blank'>
                                    link
                                </a>
                                </td>
                                <td>
                                <button class='button-x'>
                                    X
                                </button>

                                </td>
                                </tr>";
                    }
                } else {
                    echo "0 results";
                }

                ?>

<!-- 
                <tr>
                    <td>
                        Lecture
                    </td>
                    <td>
                        Introduction to Python
                    </td>
                    <td>
                        Yet to watch
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        <button class="button-x">
                            X
                        </button>
                    </td>

                </tr>

                <tr style="text-decoration: line-through;">
                    <td>
                        Lecture
                    </td>
                    <td>
                        Introduction to Python
                    </td>
                    <td>
                        Yet to watch
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        <button class="button-x">
                            X
                        </button>
                    </td>

                </tr>

                <tr>
                    <td>
                        Lecture
                    </td>
                    <td>
                        Introduction to Python
                    </td>
                    <td>
                        Yet to watch
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        <button class="button-x">
                            X
                        </button>
                    </td>

                </tr>
                <tr>
                    <td>
                        Problem
                    </td>
                    <td>
                        Leetcode:longest increasing subsequence
                    </td>
                    <td>
                        Yet to solve
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        <button class="button-x">
                            X
                        </button>
                    </td>

                </tr> -->
                <form action="submit.php" method="GET" id="addTask">
                    <tr id="taskInput">
                        <td>
                            <input type="text" name="type" class="inputField" placeholder="Task Type...">
                        </td>
                        <td colspan="2">
                            <input type="text" name="name" class="inputField" placeholder="Task Name...">
                        </td>
                        <td colspan="2">
                            <input type="text" name="link" class="inputField" placeholder="Task Link...">
                        </td>
                    </tr>

                    <tr id="taskSubmit">
                        <td id="type" colspan="5">
                            <button type="submit" form="addTask" class="button" value="add" name="submit" style="margin: 0px;">
                                <span>
                                    &nbsp; &nbsp; Add Task
                                </span>
                            </button>
                        </td>
                    </tr>
                </form>

                <tr>
                    <td id="type" colspan="5">
                        <img src="plus.png" alt="" onclick="takeinput()">
                    </td>
                </tr>
            </table>


            -
            <button type="submit" form="dsa" class="button" value="add" name="submit">
                <span>

                    <!-- <img src="plus.png" alt="add" > -->


                    &nbsp; &nbsp; Update Task
                </span>
            </button>

        </div>
        <div class="column">
            <h1>
                Leader Board
            </h1>

            <h3>Courses Completed
            </h3>
            <table>


                <tr>
                    <td style="width: 50%;">
                        Fundamentals
                    </td>
                    <td style="width: 30%;">
                        User#101121
                    </td>
                    <td>
                        59/121
                    </td>
                </tr>
                <tr>
                    <td>
                        AI Courses
                    </td>
                    <td>
                        User#101121
                    </td>
                    <td>
                        59/121
                    </td>
                </tr>
                <tr>
                    <td>
                        Core CS Courses
                    </td>
                    <td>
                        User#101121
                    </td>
                    <td>
                        59/121
                    </td>
                </tr>
                <tr>
                    <td>
                        Web Development Courses
                    </td>
                    <td>
                        User#101121
                    </td>
                    <td>
                        59/121
                    </td>
                </tr>

            </table>

            <hr style="width: 90%;">
            <h3>Contest Leader
            </h3>

            <table style="padding-bottom: 25px;">

                <tr>
                    <td style="width: 50%;">
                        UserID
                    </td>
                    <td>
                        Rating
                    </td>
                </tr>
                <tr>

                    <td>
                        User#1121221
                    </td>
                    <td>
                        3921
                    </td>
                </tr>
                <tr>

                    <td>
                        User#1121221
                    </td>
                    <td>
                        3921
                    </td>
                </tr>
                <tr>

                    <td>
                        User#1121221
                    </td>
                    <td>
                        3921
                    </td>
                </tr>
                <tr>

                    <td>
                        User#1121221
                    </td>
                    <td>
                        3921
                    </td>
                </tr>
            </table>

        </div>

    </div>


</div>

</html>