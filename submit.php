<?php   session_start();  ?>

<html>
    <head>submitted</head>

    <body>
        <?php
            echo "<h2>Service Successfully Selected!</h2><br>";
            echo $_SESSION['result'];
        ?>
    
    
    </body>