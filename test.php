<?php
	session_start();
	$email=$_SESSION['email'];
	$comanycode=$_SESSION['comanycode'];
  $companyname=$_SESSION['companyname'];
    include "connection.php"; 
?>
<style>
    <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.heero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("image/12.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 325px;
  color: black;
  background-color: #000;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #000;
  color: white;
}
button{
	background-color: #fff;
	border-radius: 12px;
	color: white;
}
</style>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
<body  style="background-color:#232323">

<?php
include "comnavbar.php";

?>
<div class="heero-image">
  <div class="hero-text">
    <h1 style="font-size:50px;color: #b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff;">Designers' Requests</h1>
   </div>
</div></br>
<div class="container1 bootstrap snipets">
   
<div class="row flow-offset-1">
 <?php 
 	if(isset($_SESSION['email'])){
		$comanycode=$_SESSION['comanycode'];
		$sql="SELECT * FROM companys WHERE comanycode= ?";
		$stmt= mysqli_stmt_init($con);
		$stmt = $con->prepare($sql);
		$stmt->bind_param("s", $comanycode);
		$stmt->execute();
		$res = $stmt->get_result();
 $companyname=$_SESSION['companyname'];
  $sql2="SELECT * FROM userdesigns WHERE companyname= ?";
  $stmt2= mysqli_stmt_init($con);
  $stmt2 = $con->prepare($sql2);
  $stmt2->bind_param("s", $companyname);
  $stmt2->execute();
  $res2 = $stmt2->get_result();

  while ($res2 && $values=$res2->fetch_assoc()){
    $_SESSION['code'] = $values['code'];
      $code=$values['code'];
      $id=$values['id'];
      $img=$values['img'];
      $type=$values['type'];
      $companyname=$values['companyname'];
      $comment=$values['comment'];
  $check="SELECT * FROM rating WHERE code='$code'" ;
  $result= mysqli_query($con,$check);
  $data = mysqli_fetch_array($result, MYSQLI_NUM);
  if($data[0]>1){
    $check2=$con->query("SELECT * FROM rating  WHERE code='$code'");
    if ($row2=$check2->fetch_assoc()){
      $price=$row2['price'];
      $ratenum=$row2['ratenum'];
      $code=$row2['code'];
      $end="SELECT * FROM userdesigns WHERE code= '$code'";
        $result2=mysqli_query($con,$end);
          
        while ($result2 && $endvalues=$result2->fetch_assoc()){
           // $code2=$endvalues['code'];
            $id=$endvalues['id'];
            $img=$endvalues['img'];
            $type=$endvalues['type'];
            $companyname=$endvalues['companyname'];
            $comment=$endvalues['comment'];

  ?>
  <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
     
        <div class="caption">
        <div class="aside">
        <img class=" tumbnail thumbnail-2" name="img" 
        src="image/<?php echo $endvalues["img"];?>"  width="240" height="250" />
        </div>
        <h5 class="text-center text-muted f">Designs code: <?php echo $row2["code"]; ?></h5>
         <h5 class="text-center text-muted f">Designs type: <?php echo $endvalues["type"]; ?></h5>
         <h5 class="text-center text-muted f">Designs size: <?php echo $endvalues["size"]; ?></h5>
         
    <h5 class="text-center text-muted f">he Design accepted with rating =  <?php echo $row2["ratenum"];?> <br>
          Price =<?php echo $row2["price"];?> ₪ </h5>
          <span class="price">
            <form  method="post"> 
          <input type="hidden"  name="price" value='<?php $price; ?>'>
          <input type="hidden" name="comanycode" value='<?$comanycode; ?>' >
          <input type="hidden" name="code"  value='<?php $row2["code"] ; ?>'>
            <input type="hidden" placeholder="quantity" name="quantity" value=" 1" required>
            <button class="button" type="submit"  name="sale">Design Sale</button>
           </form>
        </div>
        </div>
      </center>
    </div>
    <?php  }}}}
  if(isset($_POST['sale'])){
    $quantity=$_POST['quantity'];
    $inserttocart="INSERT into cart (code,comanycode,price,quantity)
    VALUES('$code','$comanycode','$price','$quantity')";
    $checkcart = $con->query($inserttocart); 
      if($checkcart){  
        $check3="SELECT * FROM cart WHERE code='$code'" ;
       $result3= mysqli_query($con,$check3);
       $data2 = mysqli_fetch_array($result3, MYSQLI_NUM);
       if($data2[0]>1){ 
         
        $check2=$con->query("SELECT quantity FROM cart WHERE code='$code'");
        $quantity=$_POST['quantity'];
        $newquantity = $_POST['quantity'] + $quantity;
        mysqli_query($con, "UPDATE cart SET quantity ='$newquantity' WHERE code=$code");
       }     
        echo '<div class="alert alert-success alert-dismissible mt-2">
               <button tybe="button" class="close" data=dismiss="alert">x</button>
               <strong>product added to the cart</strong>
               </div>';
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
    <br>
  </div>
</div>
<?php

?>




<?php
   
   if(isset($_SESSION['email'])){
    $comanycode=$_SESSION['comanycode'];
  if(isset($_POST['sale'])){
  //$code=$_POST['code'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  $check3="SELECT * FROM cart WHERE code='$code'" ;
     $result3= mysqli_query($con,$check3);
     $data2 = mysqli_fetch_array($result3, MYSQLI_NUM);
     if($data2[0]==0){ 
  $inserttocart="INSERT into cart (code,comanycode,price,quantity)
  VALUES('$code','$comanycode','$price','$quantity')";
  $res = $con->query($inserttocart); 
  if($res){  echo '<div class="alert alert-success alert-dismissible mt-2">
           <button tybe="button" class="close" data=dismiss="alert">x</button>
           <strong>product added to the cart</strong>
           </div>';
         }
         else{
          //Error
       $error = mysqli_error($con);
       print("Error Occurred: ".$error);
       //Closing the connection
       mysqli_close($con);
        }    
  }  
  else{
  $check2=$con->query("SELECT quantity FROM cart WHERE code='$code'");
      $quantity=$_POST['quantity'];
      $newquantity = $_POST['quantity'] + $quantity;
      mysqli_query($con, "UPDATE cart SET quantity ='$newquantity' WHERE code=$code");
     // header('location:compage.php');
  }  
  
  }}
?>













<?php
	session_start();
	$email=$_SESSION['email'];
	$comanycode=$_SESSION['comanycode'];
  $companyname=$_SESSION['companyname'];
  include "connection.php"; 
  
?>
<style>
    <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.heero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("image/12.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 325px;
  color: black;
  background-color: #000;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #000;
  color: white;
}
button{
	background-color: #fff;
	border-radius: 12px;
	color: white;
}
</style>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
<body  style="background-color:#232323">

<?php
include "comnavbar.php";

?>
<div class="heero-image">
  <div class="hero-text">
    <h1 style="font-size:50px;color: #b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff;">Designers' Requests</h1>
   </div>
</div></br>
<div class="container1 bootstrap snipets">
   
<div class="row flow-offset-1">
 <?php 
 	if(isset($_SESSION['email'])){
		$companyname=$_SESSION['companyname'];
    $comanycode=$_SESSION['comanycode'];
    $check=$con->query("SELECT * FROM rating WHERE comanycode='$comanycode'  ") ;
   // $result= mysqli_query($con,$check);
  
    while ($check && $row2=$check->fetch_assoc()){
        $price=$row2['price'];
        $ratenum=$row2['ratenum'];
        $code=$row2['code'];    
  $sql2=$con->query("SELECT * FROM userdesigns WHERE code= '$code'");
  if(isset($_POST['sale'])){
    //$code=$_POST['code'];
    $quantity=$_POST['quantity'];
    //$price=$_POST['price'];
    //$comanycode=$_POST['comanycode'];
    $sql="INSERT into cart (code,comanycode,price,quantity)
    VALUES('$code','$comanycode','$price','$quantity')";
    $res = $con->query($sql); 
      if($res){  echo '<div class="alert alert-success alert-dismissible mt-2">
               <button tybe="button" class="close" data=dismiss="alert">x</button>
               <strong>product added to the cart</strong>
               </div>';
             }      
          else{
            //Error
         $error = mysqli_error($con);
         print("Error Occurred: ".$error);
         //Closing the connection
        mysqli_close($con);
          }  
    }
  while ($sql2 && $values=$sql2->fetch_assoc()){
    $_SESSION['code'] = $values['code'];
      $code=$values['code'];
      $id=$values['id'];
      $img=$values['img'];
      $type=$values['type'];
      $companyname=$values['companyname'];
      $comment=$values['comment'];
      
  ?>
  <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
        <div class="caption">
        <div class="aside"> <form  method="post"> 
        <img class=" tumbnail thumbnail-2" name="img" 
        src="image/<?php echo $values["img"];?>"  width="240" height="250" />
        </div>
        <h5 class="text-center text-muted f">Designs code: <?php echo $values["code"]; ?></h5>
         <h5 class="text-center text-muted f">Designs type: <?php echo $values["type"]; ?></h5>
         <h5 class="text-center text-muted f">Designs size: <?php echo $values["size"]; ?></h5>
    <h5 class="text-center text-muted f">he Design accepted with rating =  <?php echo $row2["ratenum"];?> <br>
          Price =<?php echo $row2["price"];?> ₪ </h5>
          <span class="price">  
            
          <input type="hidden" name="comanycode" value='<? ".$comanycode."; ?>' >
          <input type="hidden" placeholder="quantity" name="quantity" value=" 1" required>
          <button class="button" type="submit"  name="sale" >Design Sale</button>
        </form>
        </div>
        
        </div>
      </center>
    </div>
    <?php  }}}  

?>
    <br>
  </div>
</div>
