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
			$query = "select * from registeration where email = '$email' limit 1";
			$result = mysqli_query($con, $query);
		
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						session_start();
						$_SESSION['id'] = $user_data['id'];
						$_SESSION['email']=$user_data['email'];
						$_SESSION['fullname']=$user_data['fullname'];
						$_SESSION['address']=$user_data['address'];

						header("Location: home.php");
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
<body>
<img class="d-flex ml-3" src="image/8" alt="Generic placeholder image" style="width:100%">

    <form class="form" method="post" name="login">
        <h1 class="login-title">Welcome To U'R Design</h1>
        <input type="text" class="login-input" name="email" placeholder="email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">Create New Account</a></p>
		
  </form>

</body>
</html>