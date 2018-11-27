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
        echo "rows got:" . $result->num_rows . "<br><br>";
        // $arr = $mysqli->fetch_assoc();
        while ($row = $result->fetch_assoc()) {
            echo $row['account'] . "<br>";
            echo $row['service_type'] . "<br>";
            echo $row['start_time'] . "<br>";
            echo $row['end_time'] . "<br>";
            echo $row['payment'] . "<br>";
            echo $row['special_requirement'] . "<br>";
            echo "<br><br><br>";
        }
    }
?>
