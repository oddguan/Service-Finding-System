<?php
    require_once("connect.php");
    $sql = "USE cguan3_1;";
    if ($mysqli->query($sql) == TRUE){
        echo "query succeeded.";
    } else {
        echo "query failed.";
    }
    $sql = "SELECT * FROM Order_History;";
    if (!$result = $mysqli->query($sql)) {
        echo "Error" . "<br>\n";
        echo $mysqli->error . "\n";
    }
    else {
        echo "rows got:" . $result->num_rows;
        $arr = $mysqli->fetch_assoc();
        while ($row = $result->fetch_assoc()) {
            echo $row['orderID'];
        }
    }
?>
