<?php
    require_once("connect.php");
    $sql = "USE cguan3_1;";
    $result = $mysqli->query($sql);
    $sql = "SELECT * FROM Demand;";
    if (!$result = $mysqli->query($sql)) {
        echo "Error" . "<br>\n";
        echo $mysqli->error . "\n";
    }
    else {
        echo "rows got:" . $result->num_rows;
        // $arr = $mysqli->fetch_assoc();
        while ($row = $result->fetch_assoc()) {
            echo $row['account'] . "&nbsp;";
            echo $row['service_type'] . "&nbsp;";
            echo $row['start_time'] . "&nbsp;";
            echo $row['end_time'] . "&nbsp;";
            echo $row['payment'] . "&nbsp;";
            echo $row['special_requirement'] . "&nbsp;";
        }
    }
?>
