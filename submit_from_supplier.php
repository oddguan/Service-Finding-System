<?php   session_start();  ?>

<html>
    <head>submitted from supplier</head>

    <body>
        <?php
            $demand = $_GET['select'];
            $arr = explode ("*", $demand);  
            $account = $arr[0];
            $service_type = $arr[1];
            $start_time = $arr[2];
            $payment = $arr[3];
            require_once('connect.php');
            $sql = "USE cguan3_1";
            $result = $mysqli->query($sql);
            $sql = "INSERT INTO Order_History VALUES(\"" . time() . "\",\"" . $_SESSION['use'] . "\",\"" . $account . "\",\"" . $start_time . "\",\"" . $service_type . "\",\"" . $payment . "\")";
            if (!$result = $mysqli->query($sql)) {
                // Oh no! The query failed. 
                echo "Sorry, the website is experiencing problems.";
            
                // Again, do not do this on a public site, but we'll show you how
                // to get the error information
                echo "Error: Our query failed to execute and here is why: \n";
                echo "Query: " . $sql . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }
            else { 
                echo "<h2>Service Successfully Selected!</h2><br>";
            }
        ?>
    <h3>
        <a href="home.php">Back to homepage</a>
    </h3>
    </body>