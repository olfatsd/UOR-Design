<?php
session_start();
include "connection.php";
$comanycode=$_SESSION['comanycode'];
$companyname=$_SESSION['companyname'];
$email=$_SESSION['email'];

include "comnavbar.php";
?>
<body style="background-color:#232323">
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
  background-image: url("image/12.jpg");
  
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
    </style>
    <div class="bg-image"></div>

<div class="bg-text">
  <h2 style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">POPULAR DESIGNES</h1>
</div>
<?php
if(isset($_SESSION['email'])){
  $comanycode=$_SESSION['comanycode'];
if(isset($_POST['add2cart'])){
  $comanycode=$_POST['comanycode'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $cpde=$_POST['code'];
     $sql="INSERT into cart (comanycode,price,quantity,code)
     VALUES('$comanycode','$price','$quantity','$code')";
     $res = $con->query($sql); 
       if($res){  echo '<div class="alert alert-success alert-dismissible mt-2">
                <button tybe="button" class="close" data=dismiss="alert">x</button>
                <strong>product added to the cart</strong>
                </div>';
              }        
   }}
?>