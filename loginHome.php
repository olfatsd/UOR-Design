<?php 
	include("connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$userEmail = $_POST['userEmail'];
		$password = $_POST['userPassword'];
		if(!empty($userEmail) && !empty($password))
		{
			//read from database
			$query = "select * from users where user_email = '$userEmail' limit 1";
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
						$_SESSION['user_email']=$user_data['user_email'];
						$_SESSION['username']=$user_data['username'];
						$_SESSION['Phone']=$user_data['Phone'];

						header("Location: Home.php");
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
<style>
	.fill {
  font-size: 20px;
  font-weight: 200;
  letter-spacing: 1px;
  padding: 13px 50px 13px;
  outline: 0;
  border: 1px solid black;
  cursor: pointer;
  position: relative;
  background-color: rgba(0, 0, 0, 0);
}

.fill::after {
  content: "";
  background-color: #ffe96e;
  width: 100%;
  z-index: -1;
  position: absolute;
  height: 100%;
  top: 7px;
  left: 7px;
  transition: 0.2s;
}

.fill:hover::after {
  top: 0px;
  left: 0px;
}
</style>
<img class="d-flex ml-3" src="image/8" alt="Generic placeholder image" style="width:100%">
<center><h1 style="font-family:Gabriola">Welcome Back To U'R Design</h1>
<a class="nav-link f" href="loginCompany.php">
<button class="fill" type="submit"  name="companypage">Company Page</button>
</a><br><br>
<a class="nav-link f" href="loginUser.php">
<button class="fill" type="submit"  name="userpage">User Page</button>
</a><br><br>
<a class="nav-link f" href="loginUser.php">
<button class="fill" type="submit"  name="userpage">Admin Login</button>
</a>
</center> 