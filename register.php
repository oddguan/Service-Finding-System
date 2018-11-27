<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
    $sql = "USE cguan3_1;";
    require_once("connect.php");
    if ($conn->query($sql) === TRUE) {
        // echo "Database found";
    }
    else {
        echo "Database not found";
    }

    $input1 = $_POST("input1");
    $input2 = $_POST("input2");
    echo $input1;
    echo $input2;
    $sql.close();
    ?>
</body>
</html>