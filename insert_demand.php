<?php   session_start();  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert Demand</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <br><br>
        Service Type: <input type="text" name="serviceType">
        <span class="error">* <?php echo $startTimeErr;?></span>
        <br><br>
        Start Time: <input type="text" name="startTime"> &nbsp;
        <span class="error">* <?php echo $startTimeErr;?></span>
        End Time: <input type="text" name="endTime">
        Payment: <input type="text" name="payment">
        <span class="error">* <?php echo $paymentErr;?></span>
        <br><br>
        Special Requirement: <input type="text" name="specialRequirement">
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    require_once("connect.php");
    $accountErr = $startTimeErr = $paymentErr = "";
    $account = $serviceType = $startTime = $endTime = $payment = $specialRequirement  = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $account = test_input($_SESSION["use"]);
        $serviceType = test_input($_POST["serviceType"]);
        $startTime = test_input($_POST["startTime"]);
        $endTime = test_input($_POST["endTime"]);
        $payment = test_input($_POST["payment"]);
        $specialRequirement = test_input($_POST["specialRequirement"]);
    }
    $sql = "USE cguan3_1;";
    $result = $mysqli->query($sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "INSERT INTO Demand VALUES (\"$account\",\"$serviceType\",\"$startTime\",\"$endTime\",\"$payment\",\"$specialRequirement\")";
        if (!$result = $mysqli->query($sql)) {
            // Oh no! The query failed. 
            echo "Sorry, the website is experiencing problems. <br>";
        
            // Again, do not do this on a public site, but we'll show you how
            // to get the error information
            echo "Error: Our query failed to execute and here is why: <br>\n";
            echo "Query: " . $sql . "<br>\n";
            echo "Errno: " . $mysqli->errno . "<br>\n";
            echo "Error: " . $mysqli->error . "<br>\n";
            exit;
        }
        else {
            echo "Inserted Demand Sucessfully.";
            // echo $account;
            // echo $password;
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
     <h3>
        <a href="home.php">Back to homepage</a>
    </h3>
</body>
</html>

