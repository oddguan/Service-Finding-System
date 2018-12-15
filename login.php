<?php  session_start(); ?>  // session starts with the help of this function 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
    $user = $_POST['user'];
    $pass = $_POST['pass'];
        require_once("connect.php");
        $sql = "USE cguan3_1";
        $result = $mysqli->query($sql);
        $sql = "SELECT password FROM Registration WHERE account=\"" . $user . "\";";
        if (!$result = $mysqli->query($sql)) {
            echo "query wrong";
            echo "Query: " . $sql . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
        }
        $arr = $result->fetch_assoc();
        if (empty($arr)) {
            echo "Account does not exist \n";
        }
        else if ($pass == $arr["password"]) {
            echo '<script type="text/javascript"> window.open("home.php","_self");</script>';
            $_SESSION['use'] = $user;
        }

        else {
            echo $user . "\n";
            echo $sql;
            echo "Wrong password \n";
            echo $arr["password"];
            print_r($arr);
        }
        
        // if($user == "Ank" && $pass == "1234")  // username is  set to "Ank"  and Password   
        // {                                   // is 1234 by default     

        // $_SESSION['use']=$user;

        //             //  On Successful Login redirects to home.php

        // }

        // else
        // {
        //     echo "invalid UserName or Password";        
        // }
}
?>
<html>
<head>

<title> Login Page   </title>

</head>

<body>
    <h1>Welcome to Project 01</h1>
    <h2>Please Login:</h2>
<form action="" method="post">

    <table width="200" border="0">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="user" > </td>
  </tr>
  <tr>
    <td> PassWord  </td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>
<a href="register.php">Register New Account</a>

</body>
</html>