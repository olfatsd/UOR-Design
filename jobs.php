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
 include "navbar.php";
 ?>
 
	
<div class="bg-image"></div>

<div class="bg-text">
  <h2 style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">JOBS</h1>
</div>
<br><br>
<div class="container solid">
    <div class="row"><center>
      <table>
        <tr>
          
            <h2 class="f">ALL JOBS</h2>
        </tr>
        <tr>
          <form action="" method="post">
            <input name="search" type="search" autofocus><input type="submit" name="button" value="search" style="background:springgreen"> 
          </form>
        </tr>
      </table></center><br>
<table>
<?php
	if(isset($_SESSION['email'])){
		$id=$_SESSION['id'];
  if(isset($_POST['button'])){    //trigger button click
    $search=$_POST['search'];
    $search2=$con->query("SELECT * FROM careers WHERE typeJop like '%{$search}%' ");
    if (mysqli_num_rows($search2) > 0) {
    while ($row = mysqli_fetch_array($search2)) {
      $typeJop=$row['typeJop'];
            $advantages=$row['advantages'];
            $bid=$row['bid'];
            $location=$row['location'];
            $comanycode=$row['comanycode']; 
            $sql="SELECT * FROM companys WHERE comanycode='$comanycode'";
            $result = $con->query($sql);
            while ($result && $row=$result->fetch_assoc()){ 
                $companyname=$row['companyname'];
                $comanycode=$row['comanycode'];
                $address=$row['address'];
                $email=$row['email'];
                $phone=$row['phone'];
                echo'


<tr>
  <td><p  class=" f" >
  <i class="glyphicon glyphicon-lock"></i>  Company Name: '.$companyname.'<br>
    <i class="glyphicon glyphicon-envelope"></i>  Email : '.$email.'<br>
    <i class="glyphicon glyphicon-earphone"></i> Phone : '.$phone.' <br>
    <i class="glyphicon glyphicon-map-marker"></i>
    '.$location.'?><br>
    <i class=" glyphicon glyphicon-briefcase"></i>  Type Jop: '.$typeJop.' <br>
    <i class="glyphicon glyphicon-bell"></i> Advantages: <br> 
    '.$advantages.'<br>
    Bid for the month  : '.$bid.' ₪<br>
    <p>
        <h4 class=" f">sent your CV to mail :  '.$email.'  </h4>
         <a href="seemore.php?seemore='.$comanycode.'" class="edit_btn" >
<button type="button" class="btn btn-info btn-lg button" data-toggle="modal" data-target="#myModal">See More</button>
                      <br>       <hr style=" border: 1px solid">
</td>
</tr>
 ';}} }
else{
  echo "No jobs Found  <br><br>";
}}
else{
		$sql="SELECT * FROM careers";
	    $result = $con->query($sql);

		 
		 while ($result && $values=$result->fetch_assoc()){
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

                echo'


                <tr>
                  <td><p  class=" f" >
                  <i class="glyphicon glyphicon-lock"></i>  Company Name: '.$companyname.'<br>
                    <i class="glyphicon glyphicon-envelope"></i>  Email : '.$email.'<br>
                    <i class="glyphicon glyphicon-earphone"></i> Phone : '.$phone.' <br>
                    <i class="glyphicon glyphicon-map-marker"></i>
                    '.$location.'?><br>
                    <i class=" glyphicon glyphicon-briefcase"></i>  Type Jop: '.$typeJop.' <br>
                    <i class="glyphicon glyphicon-bell"></i> Advantages: <br> 
                    '.$advantages.'<br>
                    Bid for the month  : '.$bid.' ₪<br>
                    <p>
                        <h4 class=" f">sent your CV to mail :  '.$email.'  </h4>
                         <a href="seemore.php?seemore='.$comanycode.'" class="edit_btn" >
                <button type="button" class="btn btn-info btn-lg button" data-toggle="modal" data-target="#myModal">See More</button>
                                      <br>       <hr style=" border: 1px solid">
                </td>
                </tr>';
 }}}} ?>
</table>
</div></div>
</body>
</html>