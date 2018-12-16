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
        Service Type: 
        <select name="serviceType">
            <option value="House_Cleaning">house cleaning</option>
            <option value="Babysitting">babysitting</option>
            <option value="Lawn_Trimming">lawn trimming</option>
        </select>
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
        if (!preg_match("/^(((\d{4})(-)(0[13578]|10|12)(-)(0[1-9]|[12][0-9]|3[01]))|((\d{4})(-)(0[469]|1‌​1)(-)([0][1-9]|[12][0-9]|30))|((\d{4})(-)(02)(-)(0[1-9]|1[0-9]|2[0-8]))|(([02468]‌​[048]00)(-)(02)(-)(29))|(([13579][26]00)(-)(02)(-)(29))|(([0-9][0-9][0][48])(-)(0‌​2)(-)(29))|(([0-9][0-9][2468][048])(-)(02)(-)(29))|(([0-9][0-9][13579][26])(-)(02‌​)(-)(29)))(\s([0-1][0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9]))$/
        ", $startTime) or !preg_match("/^(((\d{4})(-)(0[13578]|10|12)(-)(0[1-9]|[12][0-9]|3[01]))|((\d{4})(-)(0[469]|1‌​1)(-)([0][1-9]|[12][0-9]|30))|((\d{4})(-)(02)(-)(0[1-9]|1[0-9]|2[0-8]))|(([02468]‌​[048]00)(-)(02)(-)(29))|(([13579][26]00)(-)(02)(-)(29))|(([0-9][0-9][0][48])(-)(0‌​2)(-)(29))|(([0-9][0-9][2468][048])(-)(02)(-)(29))|(([0-9][0-9][13579][26])(-)(02‌​)(-)(29)))(\s([0-1][0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9]))$/
        ", $endTime)){
            $sql = "error";
        }
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

