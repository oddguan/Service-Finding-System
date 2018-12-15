<?php   session_start();  ?>

<html>
    <head>Search Demand</head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        What kind of service are you providing? : 
        <select name="service">
            <option value="any">Any</option>
            <option value="House_Cleaning">House Cleaning</option>
            <option value="Lawn_Trimming">Lawn Trimming</option>
            <option value="Babysitting">Babysitting</option>
        </select>
        <input type="submit" value="Search">
    </form>

    <?php
    require_once("connect.php");
    $service = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $service = $_POST['service'];
    }
    $sql = "USE cguan3_1;";
    $result = $mysqli->query($sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['service'] == "any") {
            $sql = "SELECT * FROM Demand";
        }
        else {
            $sql = "SELECT * FROM Demand WHERE service_type=\"" . $service .  "\";";
        }
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
        else { ?>
        <table class="table table-striped">
            <tr>
                <th>Account</th>
                <th>Service Type</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Payment</th>
                <th>Special Requirement</th>
            </tr>

        <?php
            while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['account']?></td>
                <td><?php echo $row['service_type']?></td>
	            <td><?php echo $row['start_time']?></td>
	            <td><?php echo $row['end_time']?></td>
	            <td><?php echo $row['payment']?></td>
  	            <td><?php echo $row['special_requirement']?></td>
            </tr>
            
            <?php
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
    </table>
    
    
    </body>