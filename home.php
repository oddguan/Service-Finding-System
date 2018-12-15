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
        $sql = "SELECT * FROM Registration WHERE account =\"" . $_SESSION['use'] . "\";";
        if (!$result = $mysqli->query($sql)) {
            echo $mysql->error;
        }
        else {
            $arr = $result.fetch_assoc();
            print_r($arr);
        }
        echo "Login Success";

        echo "<a href='logout.php'> Logout</a> "; 
?>
</body>
</html>