 
<?php
session_start();
if (isset($_SESSION['login'])) {
    if ($_SESSION["login"] == false) {
        header("Location : ../homePage.html");
    }
} else {
    header("Location : ../homePage.html");
}

$servername = "localhost";
$username = "root";
$db = "algoPark";
$conn = mysqli_connect($servername, $username, null, $db);

if (isset($_GET["submit"])) {

    $userInput = $_GET["userInput"];
    $userId = $_SESSION["userId"];
    $servername = "localhost";
    $username = "root";
    $db = "algoPark";
    $input = $_SESSION["forum"];

    $sql = "select forumId from forums where forumName = '$input'";
    $result = mysqli_fetch_row(mysqli_query($conn, $sql));
    $forumId = ($result[0]);
    echo "hello";
    $sql = "insert into chatmessages(forumId, userId, chatMsg) values('$forumId','$userId','$userInput')";
    $r = mysqli_query($conn, $sql);

    echo "<script>
                alert('Message sent succesfully!');
                window.location.href='./Forum.php';
            </script>";

}

?>