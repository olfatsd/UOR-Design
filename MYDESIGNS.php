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
  
  .flip-card {
    background-color: transparent;
    /*width: 300px;
    height: 300px;*/
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
<div class="bg-text">
  <h2 class="f" style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">MY DESIGNS</h2>
</div></div>


<div class="container1">
	<?php
	if(isset($_SESSION['email'])){
		$id=$_SESSION['id'];
		$sql="SELECT * FROM userdesigns WHERE id= ?";
		$stmt= mysqli_stmt_init($con);
		$stmt = $con->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$res = $stmt->get_result();
		 
		 while ($res && $values=$res->fetch_assoc()){
      $code=$values['code'];

      $img=$values['img'];
			 $type=$values['type'];
			 $companyname=$values['companyname'];
       $comment=$values['comment'];
       $size=$values['size'];
       $FabricType=$values['FabricType'];
       $hight=$values['hight'];
       $armLength=$values['armLength'];
       $chest=$values['chest'];
       $waist=$values['waist'];
       $hip=$values['hip'];

?>
<div class="card ">
    <div class="border">
	<?php
  $check="SELECT * FROM rating WHERE code='$code'" ;
  $result= mysqli_query($con,$check);
  $data = mysqli_fetch_array($result, MYSQLI_NUM);
  if($data[0]>1){
    echo'
    <img class="product tumbnail thumbnail-3" width="30" height="20"
         src="image/greensign2.png"/> 
         <h8 class="f" style="color:red">The design was approved</h8>
  ';}
  ?>
		 <div class="flip-card">
       <div class="flip-card-inner">
         <div class="flip-card-front">
		 <center>
		<img class="product tumbnail thumbnail-3" width="260" height="350"
         src="image/<?php echo $values["img"]; ?>"  /></center>         </div>
         <div class="flip-card-back">
			 <br>
       <?php
       $name=$con->query("SELECT * From companys WHERE companyname='$companyname'");
       while ($row2=$name->fetch_assoc()){

       ?>
           <h4 class="text-center text-muted f" style="color:black">Company Name : <?php echo $row2["companyname"]; }?></h4>
           <h7 class="text-center text-muted f">Design Type : <?php echo $type; ?></h7><br>
           <h7 class="text-center text-muted f">Fabric Type : <?php echo $FabricType; ?></h7><br>

           <h7 class="text-center text-muted f"> <?php echo $comment; ?></h7><br>.<br>.<br>
           <h7 class="text-center text-muted f">hight= <?php echo $hight; ?>cm ,
           Arm Length= <?php echo $armLength; ?>cm ,<br>
           chest= <?php echo $chest; ?>cm ,
           waist= <?php echo $waist; ?>cm ,
           hip= <?php echo $hip; ?>cm
          </h7><br>
          <?php
  $check="SELECT * FROM rating WHERE code='$code'" ;
  $result= mysqli_query($con,$check);
  $data = mysqli_fetch_array($result, MYSQLI_NUM);
  if($data[0]>1){
    $check2=$con->query("SELECT * FROM rating  WHERE code='$code'");
    if ($row2=$check2->fetch_assoc()){
      $price=$row2['price'];
      $ratenum=$row2['ratenum'];
    echo'
    	
    <h5 class="text-muted f" style="color:red">The Design accepted with rating =  '.$ratenum.' /10<br>
    Price = '.$price.' ₪ </h5>
  ';}}
  $rate=$con->query("SELECT price,ratenum FROM rating  WHERE code='$code'");
  if ($row4=$rate->fetch_assoc()){
    $price=$row4['price'];
    $ratenum=$row4['ratenum'];
if($ratenum>=5){
  $percent=25;
  $check3=$con->query("SELECT * FROM cart WHERE code='$code'");
  $data2=mysqli_fetch_array($check3, MYSQLI_NUM );
  if($data2[0]>1){
    $check3=$con->query("SELECT price , quantity FROM cart WHERE code='$code'");
    if($row3=$check3->fetch_assoc()){
      $price=$row3['price'];
      $quantity=$row3['quantity'];
      $percentage_earned=(($price/100)*$percent)* $quantity;
      echo'
    <h5 class="text-muted f" style="color:red">Quantity of sale =  '.$quantity.' <br>
    Percentage Earned = '.$percentage_earned.' ₪ </h5>
  ';
    }
  }}

}


  ?>
          </div>
       </div>
     </div>
     </div><br>
<br>
</div>		 

<?php }
}?>	<center><a class="nav-link f" href="addDesign.php">
<div class="card ">
    <div class="border">
		<center>
	<h1>+</h1></center>
     </div></a></center>
</div>
</div>
</body>
</html>