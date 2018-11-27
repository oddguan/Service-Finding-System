<?php
    require_once("connect.php");
    $sql = "USE cguan3_1;";
    $mysqli->query($sql);
    $sql = "SELECT * FROM Order_History;";
    if (!$result = $mysqli->query($sql)) {
        echo "Error" . "<br>\n";
        echo $mysqli->error . "\n";
    }
    else {
        $arr = $mysqli->fetch_assoc();
        while ($row = $result->fetch_assoc()) {
            echo $row['orderID'];
        }
    }
?>
