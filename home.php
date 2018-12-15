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

        echo "<h1>Hello, " . $_SESSION['use'] . "</h1>";
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
            echo "sucess";
            $arr = $result->fetch_assoc();
            print_r($arr);
        }
        // echo "Login Success";

        echo "<a href='logout.php'> Logout</a> "; 
?>

<h2>Demander Utilities</h2>
<br>
<a href="insert_demand.php">Post what a demand of service</a>
<br>
<a href="search"
<br>

<h2>Supplier Utilities</h2>
<a href="insert_supply.php">Post what kind of service are you supplying</a>
<a href="search_demand.php">Search for a service demand</a>
</body>
</html>