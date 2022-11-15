<?php
    session_start();
    session_destroy();

    echo "<script>
        alert('Logout succesfully!');
        window.location.href='../home.html';
        
        
        
        </script>";


    // header('Location: ../home.html');
?>