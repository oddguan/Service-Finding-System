<?php
    require_once("connect.php");
    $sql = "SELECT * FROM Order_History;";
    if (!$result = $mysqli->query($sql)) {
        echo "Error" . "<br>\n";
        echo $mysqli->error . "\n";
    }
    else {
        echo $result;
    }
?>
