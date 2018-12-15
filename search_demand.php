<?php   session_start();  ?>

<html>
    <head>Search Demand</head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        What kind of service are you providing? : 
        <select name="service">
            <option value="House_Cleaning">House Cleaning</option>
            <option value="Lawn_Trimming">Lawn Trimming</option>
            <option value="Babysitting">Babysitting</option>
            <option value="any">Any</option>
        </select>
        <input type="submit" value="Search">
    </form>

    <?php
    require_once("connect.php");
    $service = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["service"] == "any") {
            $service = "*";
        }
        else {
            $service = $_POST['service'];
        }
    }
    $sql = "USE cguan3_1;";
    $result = $mysqli->query($sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT * FROM Demand WHERE service_type=\"" . $service .  "\";";
        if (!$result = $mysqli->query($sql)) {
            // Oh no! The query failed. 
            echo "Sorry, the website is experiencing problems. <br>";
        
            // Again, do not do this on a public site, but we'll show you how
            // to get the error information
            echo "Error: Our query failed to execute and here is why: <br>\n";
            echo "Query: " . $sql . "<br>\n";
            echo "Errno: " . $mysqli->errno . "<br>\n";
            echo "Error: " . $mysqli->error . "<br>\n";
            exit;
        }
        else {
            echo "Demand found <br>";
            $arr = $result->fetch_assoc();
            foreach($arr as $element){
                echo $element . "<br><br>";
            }
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    
    
    </body>