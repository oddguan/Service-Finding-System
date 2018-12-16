<?php   session_start();  ?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
<?php
    if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
    {
        header("Location:login.php");  
    }
        require_once("connect.php");
        $sql = "USE cguan3_1";
        $result = $mysqli->query($sql);
        // echo "database selected <br>";
        $sql = "SELECT * FROM Registration WHERE account =\"" . $_SESSION['use'] . "\";";
        if (!$result = $mysqli->query($sql)) {
            echo "error <br>";
            echo $mysql->error;
        }
        else {
            //echo "sucess";
            $arr = $result->fetch_assoc();
            $date = $arr['registration_date'];
            $phone_number = $arr['phone_number'];
            $first_name = $arr['first_name'];
        }
        // echo "Login Success";
        echo "<h1>Hello, " . $first_name . "</h1>";

        echo "<a href='logout.php'> Logout</a> "; 
?>
<p>
<h2>Demander Utilities</h2>
<a href="insert_demand.php">Post a demand of service</a>
<br>
<br>
<a href="search_supply.php">Search for a service supply</a>
<br>
<br>

<h2>Supplier Utilities</h2>
<a href="insert_supply.php">Post what kind of service are you supplying</a>
<br>
<br>
<a href="search_demand.php">Search for a service demand</a>
</p>
</body>
</html>