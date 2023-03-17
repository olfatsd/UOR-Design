<?php 
	include("connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password= $_POST['password'];
		if(!empty($email) && !empty($password))
		{
			//read from database
			$query = "select * from companys where email = '$email' limit 1";
			$result = mysqli_query($con, $query);
		
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						session_start();
						$_SESSION['comanycode'] = $user_data['comanycode'];
						$_SESSION['email']=$user_data['email'];
						$_SESSION['companyname']=$user_data['companyname'];
						$_SESSION['address']=$user_data['address'];
						header("Location: compage.php");
						die;
					    
					}
					
				}
			}
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}


?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<img class="d-flex ml-3" src="image/8" alt="Generic placeholder image" style="width:100%">

    <form class="form" method="post" name="Login">
        <h1 class="login-title">Login Company</h1>
        <input type="text" class="login-input" name="email" placeholder="email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="company number"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="comSinup.php">company Registration</a></p>
		
  </form>

</body>
</html>