<?php
session_start();
$email=$_SESSION['email'];
$companyname=$_SESSION['companyname'];
$comanycode=$_SESSION['comanycode'];
$see='';

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
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
button{
	background-color: #b3b3b3;
	border-radius: 12px;
	color: white;
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
    max-height: 800px;
    max-width: 100px;
    min-height: 800px;
    min-width: 1000px;
    display: flex;
    justify-content: space-around;
    margin: 0 auto;
	align-items: left;
  }
  
 
  
  .flip-card {
    background-color: transparent;
    width: 230px;
    height: 280px;
    perspective: 1000px;
  }
  
  .flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.6s;
    transform-style: preserve-3d;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  }
  
  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }
  
  .flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
  }
  
  .flip-card-front {
    /*background-color: rgb(255, 255, 255);*/
    color: black;
  }
  
  .flip-card-back {
    background-color:rgb(209, 209, 209);
    color: rgb(255, 255, 255);
    transform: rotateY(180deg);
  }
 
</style>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <body onload = "startTimer()" style="background-color:#232323">
<?php include "comnavbar.php"?>
<div class="heero-image">
  <div class="hero-text">
    <h1 style="font-size:50px;color: #b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff;">Designers' Requests</h1>
   </div>
</div></br>

<div class="bootstrap snipets">
<?php 
include "connection.php";
 if(isset($_SESSION['email'])){
 
  $companyname=$_SESSION['companyname'];
  $sql="SELECT * FROM userdesigns WHERE companyname= ?";
  $stmt= mysqli_stmt_init($con);
  $stmt = $con->prepare($sql);
  $stmt->bind_param("s", $companyname);
  $stmt->execute();
  $res = $stmt->get_result();
   while ($res && $values=$res->fetch_assoc()){
      $code=$values['code'];
      $id=$values['id'];
      $img=$values['img'];
      $type=$values['type'];
      $companyname=$values['companyname'];
      $comment=$values['comment'];

      $sql2=$con->query("SELECT * FROM registeration WHERE id='$id'" );
      while ($row2=$sql2->fetch_assoc()){
          $fullname=$row2['fullname'];
          $email=$row2['email'];
          $address=$row2['address'];
          $gender=$row2['gender'];
?>  <div class="row flow-offset-2">  

  
  <div class="col-xs-2 col-md-7">        
    <img  name="img" src="image/<?php echo $row2["image"];?>"  width="110" height="160" />          
      <p  class=" text-muted f" >
      Designer Name: <?php echo $row2["fullname"]; ?> <br>
      email : <?php echo $row2["email"];?> <br>
      Design Type: <?php echo $values["type"]; ?>
      <p>  
      <?php 
      $check="SELECT * FROM rating WHERE code='$code'" ;
      $result= mysqli_query($con,$check);
      $data = mysqli_fetch_array($result, MYSQLI_NUM);
      if($data[0]>1){
        $rating=$con->query("SELECT * FROM rating  WHERE code='$code'");
        if ($row2=$rating->fetch_assoc()){
          $ratenum=$row2['ratenum'];
          $price=$row2['price'];
          $comanycode=$row2['comanycode'];

          echo ' 
          <img class="product tumbnail thumbnail-3" width="260" height="350"
         src="image/' .$img.' ">
          <h3 class="text-muted f">The Design accepted with rating =  '.$ratenum.' <br>
          Price = '.$price.' ₪ </h3>
          ';
          if(isset($_SESSION['email'])){
            $comanycode=$_SESSION['comanycode'];
          if(isset($_POST['sale'])){
            $comanycode=$_POST['comanycode'];
            $price=$_POST['price'];
            $quantity=$_POST['quantity'];
            $code=$_POST['code'];
               $sql="INSERT into cart (comanycode,price,quantity,code)
               VALUES('$comanycode','$price','$quantity','$code')";
               $check3=$con->query("SELECT * FROM cart WHERE code='$code'" );
              // $result3= mysqli_query($con,$check3);
               $data2 = mysqli_fetch_array($check3, MYSQLI_NUM);
               if($data2[0]>1){ 
                $check2=$con->query("SELECT quantity FROM cart WHERE code='$code'");
               if ($change=$check2->fetch_assoc()){
                $quantity=$change['quantity'];
                $one=1;
                $quantity +=  $one ;                
                $add="UPDATE cart SET quantity='$quantity' WHERE code='$code'";
                $addagain=$con->query($add);
                if($addagain){
                  header('location: compage.php');
                }
               
              else{
                $error = mysqli_error($con);
                print("Error Occurred: ".$error);
              }}
            }
            
             else{
              $inserttocart="INSERT into cart (code,comanycode,price,quantity)
            VALUES('$code','$comanycode','$price','1')";
             
            $res = $con->query($inserttocart);
            if($res){  header('location: compage.php');
                   }      
                              } 
            }
             echo'<form  method="post"> 
             <input type="hidden"  name="price" value='.$price.'>
             <input type="hidden" name="comanycode" value='.$comanycode.' >
             <input type="hidden" name="code"  value='.$code. '>
               <input type="hidden" min=0  max=100 placeholder="quantity" name="quantity"  required>
               <button class="button" type="submit"  name="sale">Design Sale</button>
              </form>';          


        }}
      }
        else{
      echo '<a href="seemore2.php?seemore2='.$code.'" class="edit_btn" >
<button type="button" class="btn btn-info btn-lg button" data-toggle="modal" data-target="#myModal">See More</button>
          </a>'; }?>

  </div> 
    
</div><hr>
<?php }}}?>    
</div>
