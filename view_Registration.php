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
            echo $row['password'] . "<br>";
            echo $row['registration_date'] . "<br>";
            echo $row['phone_number'] . "<br>";
            echo $row['first_name'] . "<br>";
            echo $row['middle_init'] . "<br>";
            echo $row['last_name'] . "<br>";
            echo "<br><br>";
        }
    }
?>