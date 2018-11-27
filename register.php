<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register New Account</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/register.css" />
</head>
<body>
    <?php
    $sql = "USE cguan3_1;";
    require_once("connect.php");
    if ($conn->query($sql) === TRUE) {
        echo "Database found";
    }
    else {
        echo "Database not found";
    }
    ?>
</body>
</html>

