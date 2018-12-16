<?php   session_start();  ?>

<html>
    <head>submitted</head>

    <body>
        <?php
            echo $_GET['select'];
            print_r($_GET['select']);
            echo "<h2>Service Successfully Selected!</h2><br>";
            $result = $_SESSION['select'];
            echo $result;
            print_r($result);
        ?>
    
    
    </body>