<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register New Account</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Account: <input type="text" name="account">
        <span class="error">* <?php echo $accountErr;?></span>
        <br><br>
        Password: <input type="password" name="password">
        <br><br>
        Retype Password: <input type="password" name="password_2">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        Phone Number: <input type="text" name="phoneNumber">
        <br><br>
        First Name: <input type="text" name="firstName">
        <span class="error">* <?php echo $firstNameErr;?></span>
        M.I.: <input type="text" name="MI" size=8>
        Last Name: <input type="text" name="lastName">
        <span class="error">* <?php echo $lastNameErr;?></span>
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    require_once("connect.php");
    $accountErr = $passwordErr = $phoneNumberErr = $firstNameErr = $lastNameErr = $MIErr = "";
    $account = $password = $password_2 = $phoneNumber = $firstName = $MI = $firstName = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["account"])) {
            $accountErr = "Account is required";
            echo $accountErr . '<br>';
        } 
        else {
            $account = test_input($_POST["account"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
                echo $nameErr . '<br>'; 
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
            echo $passwordErr . '<br>';
        }
        else {
            $password = test_input($_POST["password"]);
        }

        if ($_POST["password"] != $_POST['password_2']) {
            $passwordErr = "Passwords has to match";
            echo $passwordErr . '<br>';
        }

        if (empty($_POST["password_2"])) {
            $passwordErr = "Password confirmation is required";
            echo $passwordErr . '<br>';
        }
        else {
            $password_2 = test_input($_POST["password_2"]);
        }

        $phoneNumber = test_input($_POST["phoneNumber"]);

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
            echo $passwordErr . '<br>';
        }
        else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["firstName"])) {
            $firstNameErr = "First name is required";
            echo $firstNameErr . '<br>';
        }
        else {
            $firstName = test_input($_POST["firstName"]);
        }

        $MI = test_input($_POST["MI"]);

        if (empty($_POST["lastName"])) {
            $lastNameErr = "Last name is required";
            echo $lastNameErr . '<br>';
        }
        else {
            $lastName = test_input($_POST["lastName"]);
        }
    }
    $sql = "USE cguan3_1;";
    $result = $mysqli->query($sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($firstName != "" or $lastName != "" or $_POST["password"] == $_POST['password_2'] or $account != "" or $password != "" or $password_2 != "") {
            $sql = "INSERT INTO Registration VALUES (\"$account\",\"$password\",NOW(),\"$phoneNumber\",\"$firstName\",\"$MI\",\"$lastName\")";
        }
        else {
            $sql = "error";
        }
        if (!$result = $mysqli->query($sql)) {
            // Oh no! The query failed. 
            echo "Sorry, something is missing. <br>";
        
            // Again, do not do this on a public site, but we'll show you how
            // to get the error information
            echo "Error: Our query failed to execute and here is why: <br>\n";
            echo "Query: " . $sql . "<br>\n";
            echo "Errno: " . $mysqli->errno . "<br>\n";
            echo "Error: " . $mysqli->error . "<br>\n";

        }
        else {
            echo "Registered Sucessfully.";
            echo $account;
            echo $password;
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <a href="index.php">back to home page</a>
</body>
</html>

