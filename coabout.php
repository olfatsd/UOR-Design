<?php
	session_start();
	$email=$_SESSION['email'];
	$comanycode=$_SESSION['comanycode'];

	include "connection.php";
?>
<html>
<head>
<meta charset="utf-8">
    <title>U'R DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
body {
  background-image: url('image/5.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
h3{
  font-family: serif;
}
.centered {
  text-align: center;
}
.f{
		  font-family:cursive	;
      color: white;
	  }

	.img {
  border-radius: 100%;
  border: 5px solid #b7aa8d;
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("image/career.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 330px; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 60%;
  padding: 20px;
  text-align: center;
}

</style>
</head>
<body>
<?php
 include "comnavbar.php"
 ?>
</br></br>
<p> 
<h3 style="color:#ffffff"><mark>Welcome to you'r design website.</mark></h3>
<h3 style="color:#b7aa8d">
On this website you can submit several designs </br>
for saveral companies</br>
that will evaluate your design</br>
The design that gets a high rating</br>
 will be stitched by the company that evaluated it.</br></br> 
Not only will it be sewn but the value of purchase</br>
 will be agreed upon by the company</br>
and the percentage of profit between </br>
the company and the designer upon sale.</br></br>
With this possibility dear designer </br>
you can advance in the field and earn money </br>
and companies in addition to providing</br>
assistance can also earn money.</br>
</h3>
<h3 style="color:#ffffff"><mark>GOOD JOB AND LOTS OF MONEY :)</mark></h3>
</p>
</br></br>



<br><br>
<div class="container solid">
    <div class="row">
<table>
<tr>
<center>
    <h2 class="f">ALL JOBS</h2>
</center>

</tr>
<?php
	if(isset($_SESSION['email'])){
		$comanycode=$_SESSION['comanycode'];
		$sql="SELECT * FROM careers WHERE comanycode= ?";
		$stmt= mysqli_stmt_init($con);
		$stmt = $con->prepare($sql);
		$stmt->bind_param("s", $comanycode);
		$stmt->execute();
		$result = $stmt->get_result();
		 

		 
		 while ($result && $values=$result->fetch_assoc()){
       $careerCode=$values['careerCode'];
            $typeJop=$values['typeJop'];
            $advantages=$values['advantages'];
            $bid=$values['bid'];
            $location=$values['location'];
            $comanycode=$values['comanycode']; 
      
            $sql="SELECT * FROM companys WHERE comanycode='$comanycode'";
            $result = $con->query($sql);
            while ($result && $row=$result->fetch_assoc()){ 
                $companyname=$row['companyname'];
                $comanycode=$row['comanycode'];
                $address=$row['address'];
                $email=$row['email'];
                $phone=$row['phone'];

?>
<tr>
  <td><p  class=" f"  style="color:#ffffff" >
    <form method="post">
  <i class="glyphicon glyphicon-lock"></i>  Company Name: <?php echo $row["companyname"]; ?> <br>
    <i class="glyphicon glyphicon-envelope"></i>  Email : <?php echo $row["email"];?> <br>
    <i class="glyphicon glyphicon-earphone"></i> Phone : <?php echo $row["phone"];?> <br>
    <i class="glyphicon glyphicon-map-marker"></i>
    <?php echo $values["location"]; ?><br>
    <i class=" glyphicon glyphicon-briefcase"></i>  Type Jop: <?php echo $values["typeJop"]; ?><br>
    <i class="glyphicon glyphicon-bell"></i> Advantages: <br> 
    <?php echo $values["advantages"]; ?><br>
    Bid for the month  : <?php echo $values["bid"]; ?> ₪<br>
    <p>
        <br>
        <input type="hidden"  name="careerCode" value='<?php echo $careerCode; ?>' >

        <?php echo '<a href="updateJop.php?edit='.$careerCode.'" class="edit_btn" >'?>
<button type="button" class="btn btn-info btn-lg button" data-toggle="modal" data-target="#myModal">Update</button>

            </form>  <br>    
                      <hr style=" border: 1px solid">
</td>
</tr>
<?php }}} ?>
</table>
</div></div>

<h3>
<marquee style="color:#ffffff">
katreen fadel E-mail : katreen.fa@gmail.com phone-number : 0529522059 /
olfat saad E-mail : ulfatsaad97@gmail.com phone-number : 0585066442
</marquee></h3>
</body>
</html>
