<?php
session_start();
	include "connection.php";
    
    $comanycode=$_SESSION['comanycode'];
    $email=$_SESSION['email'];
    if(isset($_SESSION['email'])){
        $comanycode=$_SESSION['comanycode'];
    if(isset($_POST['addDesigner'])){
        $designername=$_POST['designername'];
        $img=$_POST['img'];
        $phone=$_POST['phone'];
        $sql="INSERT INTO thedesinger(comanycode,designername,phone,img) 
        values('$comanycode','$designername','$phone','$img')";
        $res = $con->query($sql);
        if ($res){
            header("location:compage.php");
        }
        else{
          //Error
       $error = mysqli_error($con);
       print("Error Occurred: ".$error);
       //Closing the connection
       mysqli_close($con);
        }
    }
    }
    ?>
?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
    <form class="form" method="post" name="Login">
        <h1 class="login-title">Add Designer</h1>
        <input type="text" class="login-input" name="designername" placeholder="designer name" autofocus="true"/>

        <input type="text" class="login-input" name="phone" placeholder="designer phone"/>
        <input type="file" class="login-input" name="img" placeholder="designer img"/>

        <input type="submit" value="Login" name="addDesigner" class="login-button"/>
		
  </form>

</body>
</html>