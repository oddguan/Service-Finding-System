<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show order</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Order ID: <input type="text" name="orderID"> <br>
    <input type="submit" value="Submit">
    </form>

    <?php
    $orderID = $_POST["orderID"];
    $selected = "";
    require_once("connect.php");
    $sql = "USE cguan3_1;";
    if (!$result = $mysqli->query($sql)) {
        echo "Database fails to select";
        echo"<br>\n";
        echo $mysqli->error . "\n";
    }
    
    $sql = "SELECT $orderID FROM Order_History;";    
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
        $arr = $result->fetch_assoc();
        $selected = $arr[0];
        echo $selected;
    }

    $mysqli->close();
    ?>
</body>
</html>