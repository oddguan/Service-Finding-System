<?php   session_start();  ?>

<html>
    <head>submitted</head>

    <body>
        <?php
            $demand = $_GET['select'];
            $account = $demand['account'];
            $start_time = $demand['start_time'];
            $service_type = $demand['service_type'];
            echo $account;
            echo $start_time;
            echo $service_type;
            echo $demand[0];
            // require_once('connect.php');
            // $sql = "USE cguan3_1";
            // $result = $mysqli->query($sql);
            // $sql = "SELECT * FROM Demand WHERE account=\"" . $account . "\"";
            // if (!$result = $mysqli->query($sql)) {
            //     // Oh no! The query failed. 
            //     echo "Sorry, the website is experiencing problems.";
            
            //     // Again, do not do this on a public site, but we'll show you how
            //     // to get the error information
            //     echo "Error: Our query failed to execute and here is why: \n";
            //     echo "Query: " . $sql . "\n";
            //     echo "Errno: " . $mysqli->errno . "\n";
            //     echo "Error: " . $mysqli->error . "\n";
            //     exit;
            // }
            // else {
                
            // }
            // echo "<h2>Service Successfully Selected!</h2><br>";
            
        ?>
    
    
    </body>