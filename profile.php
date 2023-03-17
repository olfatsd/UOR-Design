<?php
	session_start();
	$email=$_SESSION['email'];

	include "connection.php";
?>
<html>
<head>
<meta charset="utf-8">
    <title>U'R DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
.centered {
  text-align: center;
}
.f{
		  font-family:cursive	;
	  }

	.img {
  border-radius: 100%;
  border: 5px solid #b7aa8d;
}

.container1 {
    height: 80vh;
    width: 80vw;
    max-height: 1000px;
    max-width: 100px;
    min-height: 1000px;
    min-width: 1000px;
    display: flex;
    justify-content: space-around;
    margin: 0 auto;
	align-items: left;
  }
  .border {
    height: 369px;
    width: 290px;
    background: transparent;
    border-radius: 10px;
    transition: border 1s;
    position: relative;
	align-items: center;

  }
  .border:hover {
    border: 1px solid #fff;
  }
  .card {
    height: 379px;
    width: 300px;
    background: #808080;
    border-radius: 10px;
    transition: background 0.8s;
    overflow: hidden;
    background:rgba(121, 86, 122, 0.856);
    box-shadow: 0 70px 63px -60px rgba(189, 160, 190, 0.856);
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    }
  
  
  .fill {
  font-size: 22px;
  font-weight: 200;
  letter-spacing: 1px;
  padding: 13px 50px 13px;
  outline: 0;
  border: 1px solid white;
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
</head>
<body style="background-color:#232323">

<?php
 include "navbar.php";
 ?>
 
		<div class="centered">
            <?php
				if($_SESSION['id']!=null)
					$id = $_SESSION['id'];
				else
					echo "Session not set yet.";
				$record = mysqli_query($con , "SELECT * FROM registeration WHERE id = '$id'");
				$data = mysqli_fetch_array($record);
			?>
			<img class="img" src="image/<?php echo $data["image"]; ?>" alt="Avatar" style="width:180px"><br>
			<h2 style= "font-family:fantasy;color: #ffffff; -webkit-text-stroke-width:2px; -webkit-text-stroke-color:#b7aa8d;">DESIGNER DETAILS</h2>
			<h4 style="font-family:fantasy; color:#b7aa8d">
				<u style="font-size:120%;color:#ffffff">Name:</u>&nbsp &nbsp<?php echo $data['fullname'];?> <br>
				<u style="font-size:120%;color:#ffffff">Email:</u>&nbsp &nbsp<?php echo $data['email'];?> <br>
				<u style="font-size:120%;color:#ffffff">Address:</u>&nbsp &nbsp<?php echo $data['address'];?> <br>
				<u style="font-size:120%;color:#ffffff">Comment:</u>&nbsp &nbsp<?php echo $data['comment'];?> <br>
			</h4>
			
	<br>
  <a class="nav-link f" href="MYDESIGNS.php">
<button class="fill" type="submit"  name="companypage">MY DESIGNS</button>
</a><br><br>
<a class="nav-link f" href="auction2.php">
<button class="fill" type="submit"  name="userpage">AUCTION</button>
</a><br><br>
</body>
</html>