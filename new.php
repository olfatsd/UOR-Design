<?php
session_start();
include "connection.php";


?>

<html>
<head>
<meta charset="utf-8">
    <title>U'R DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="card.css">
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
	<style>
  .f{
    font-family:cursive	;
    color: #fff;
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
  background-image: url("image/9.png");
  
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
.container1 {
    height: 90vh;
    width: 90vw;
    max-height: 500px;
    max-width: 1800px;
    min-height: 200px;
    min-width: 1000px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 auto;
  }
  .new
    {
      position: relative;
      top: 60;
      left: -90;
    }
    
</style>
</head>
<body style="background-color:#232323">
<?php
include "navbar.php";
?>
<div class="bg-image"></div>

<div class="bg-text">
  <h2 style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">NEW IN FASHION</h1>
</div>
<br><br><br><br>
<div class="container1 bootstrap snipets">
   
<div class="row flow-offset-1">
<?php 
include "connection.php";
 if(isset($_SESSION['email'])){
  $sql=$con->query("SELECT * FROM thedesigns");
 
   while ($sql && $values=$sql->fetch_assoc()){
      $code=$values['code'];
      $image=$values['image'];
      $type=$values['type'];
      $comanycode=$values['comanycode'];
      $size=$values['size'];
      $date=$values['date'];
      $checkthedate=floor((abs(strtotime(date("Y-m-d")) - strtotime($date))/(60*60*24)));
      //בודקת ההפרש בין יום העלאה העיצוב לאתאר ובין הזמן האמת 
      if( $checkthedate< 8 ) {
        $sql2=$con->query("SELECT * FROM companys WHERE comanycode='$comanycode'" );
        while ($row2=$sql2->fetch_assoc()){
      ?> 
      <div class="col-xs-7 col-md-4">
    <div class="grid-item">            

        <div class="caption">
        <div class="aside">

        <center>
        <div style="position: relative; left: 0; top: 0;">
        <img class=" tumbnail thumbnail-3 new" name="img" src="image/new.png"  width="40" height="60" /><br>
        <img class=" tumbnail thumbnail-3 img" name="img" src="image/<?php echo $values["image"];?>"  width="220" height="260" /><br>
  </div>
            
    </center>
        </div>
  

        <h4 class="text-center text-muted f">Company Name: <?php echo $row2["companyname"]; ?></h4>        
         <h4 class="text-center text-muted f">Design type: <?php echo $values["type"]; ?></h4>
         <h6 class="text-center text-muted f">Company email: <?php echo $row2["email"]; ?></h6>        
         <h6 class="text-center text-muted f">Company phone: <?php echo $row2["phone"]; ?></h6>        

        

          </div>
        </div>
      <br>
      </div>
 <?php }}}}?>  </div> </div>
