<?php 
	$con= new mysqli("localhost", "root", "", "desgins"); 
	if (!$con) { 
		die("Could not connect: " . mysqli_error()); 
	} 
	$update1 = false;
	if (isset($_POST['update'])) {
		$careerCode = $_POST['careerCode'];
		$typeJop=$_POST['typeJop'];
        $advantages=$_POST['advantages'];
        $bid=$_POST['bid'];
        $location=$_POST['location'];

        mysqli_query($con, "UPDATE careers SET typeJop='$typeJop' ,bid='$bid', advantages='$advantages', location='$location' WHERE careerCode=$careerCode");
		$_SESSION['message'] = "job updated!"; 
		header('location: coabout.php');
	}
?>