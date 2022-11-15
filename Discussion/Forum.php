<?php
     
     session_start();


     if(isset($_SESSION['login'])){
         if($_SESSION["login"] == false){
             header("Location : ../homePage.html");
        
          }
     }
     else{
         header("Location : ../homePage.html");

     }



    $servername = "localhost";
    $username = "root";
    $db = "algoPark";

    $conn = mysqli_connect($servername, $username, null, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $input = isset($_GET["submit"]) ? $_GET["submit"] : "Competitive Coding";
    $_SESSION["forum"] = $input;
    // $conn = mysqli_connect($servername, $username, null, $db);
        $sql = "select forumId from forums where forumName = '$input'";
        $result = mysqli_fetch_row(mysqli_query($conn, $sql));    
        $forumId = ($result[0]);
        // print_r($result);


    if($input == "add"){
        header("Location: ./addForum.php");
    }
?>

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
        .container{
            width: 100%;
            height: 100%;
            /* overflow-y: scroll; */
            position: relative;
        }
        body{
            background-color: #B1E1FF;
            font-family: rubik;
        }
        *{font-weight: 300;}
        .header{
            text-align: center;
        }

        .msg{
            width: 60%;
            border: 2px solid black;
            background-color: #B0C7BD;
            padding: 15px;
            margin-bottom: 15px;
        }
        .user-msg{
            width: 60%;
            border: 2px solid #A66CFF;
            background-color: #B0C7BD;
            padding: 15px;
            margin-bottom: 15px;
        }

        .userInput{
            float: bottom;
            /* background-color: #B0C7BD; */
            width: 60%;
            /* border: 2px solid black; */
        }

        .button{
			width: 100%;
			border: 2px solid #B1E1FF;
			padding: 18px;
			font-family: rubik,sans-serif;
			cursor: pointer;
			text-transform: uppercase;
			background: #A66CFF;
			color: #B1E1FF;
			
		}


		.button:hover{
			border: 2px solid #B1E1FF;
			background: #B1E1FF;
			color: #A66CFF;
		}

        .inputSection{
            display:flex;
            margin-top: 35px;
            margin-bottom: 35px;
        }

        textarea{
            border: 2px solid #A66CFF;
            background-color: #E6F4F1;
            font-size: 16px;
        }
    </style>
    <div class="container">

        <h1 class="header">
            <?php echo $input;?>
        </h1>

        <form action="addMsg.php" method="GET">
            <div class = "inputSection">
                <div class="userInput">
                    
                    <textarea name="userInput" cols="40" rows="6" placeholder="Enter your Comment here..."></textarea>
                    
                </div>
               
                <div>
                    <button name="submit" type="submit" class="button">Submit</button>
                </div>
            </div>
        </form>
        <?php
            $sql = "select * from chatmessages natural join login_cred where forumId = '$forumId' and login_cred.userId = chatmessages.userId";
            $result = mysqli_query($conn, $sql);
            $itr = 0;

            
            if (mysqli_num_rows($result) > 0) {
                $prompt = false;
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['username'] == $_SESSION["name"]){
                    echo "<div class='user-msg'><h3>You : $row[username]</h3><div>$row[chatMsg]</div></div>";

                    }
                    else{
                        echo "<div class='msg'><h3>User Name: $row[username]</h3><div>$row[chatMsg]</div></div>";
                    }
                }
            } else {
                echo "0 results";
            }
        ?>
    </div>

    <script>
        $('textarea').autoResize();
    </script>

</body>
</html>