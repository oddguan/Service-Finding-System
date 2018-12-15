<?php   session_start();  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post Supply</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <br><br>
        Service Type: <input type="text" name="serviceType">
        <span class="error">* <?php echo $serviceTypeErr;?></span>
        <br><br>
        Salary Requirement: <input type="text" name="salaryRequirement">
        <span class="error">* <?php echo $salaryRequirementErr;?></span>
        Start Time: <input type="text" name="startTime"> &nbsp;
        <span class="error">* <?php echo $startTimeErr;?></span>
        End Time: <input type="text" name="endTime">
        <span class="error">* <?php echo $endTimeErr;?></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    require_once("connect.php");
    $serviceTypeErr = $salaryRequirementErr = $startTimeErr = $endTimeErr = "";
    $account = $serviceType = $startTime = $endTime = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $account = test_input($_SESSION["use"]);
        $serviceType = test_input($_POST["serviceType"]);
        $salaryRequirement = test_input($_POST["salaryRequirement"]);
        $startTime = test_input($_POST["startTime"]);
        $endTime = test_input($_POST["endTime"]);
    }
    $sql = "USE cguan3_1;";
    $result = $mysqli->query($sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "INSERT INTO Supply VALUES (\"$account\",\"$serviceType\",\"$salaryRequirement\",\"$startTime\",\"$endTime\")";
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
            echo "Sucessfully posted supply.";
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
    <a href="index.html">back to home page</a>
</body>
</html>

