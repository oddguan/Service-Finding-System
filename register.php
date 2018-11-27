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