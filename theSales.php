<?php 
include "connection.php";
?>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table {
  border-collapse: collapse;
  width: 60%;
}

th, td{
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;


}
.solid {border-style: solid;}
.bg-image {
  /* The image used */
  background-image: url("image/14.jpg");
  
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
  .flip-card {
    background-color: transparent;
  width: 240;
    height: 250;
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Page</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="admin.php">Admin HOME</a></li>
	  <li><a href="allcom.php">All Companys</a></li>
      <li><a href="allusers.php">All Users</a></li>
    <li><a href="statistics.php">STATISTICS</a></li>
      <li><a href="logout.php">LOGOUT</a></li>

    </ul>
  </div>
</nav>
<div class="bg-image"></div>

<div class="bg-text">
  <h2 style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">STATISTICS</h1>
</div>

<div class="container1 bootstrap snipets">
   
<div class="row flow-offset-3">
<?php
		$sql="SELECT * FROM cart ";
        $result2 = $con->query($sql);

		 while ($result2 && $row=$result2->fetch_assoc()){
			 $code=$row['code'];
			 $comanycode=$row['comanycode'];
             $quantity=$row['quantity'];
             $price=$row['price'];

             $sql2=$con->query("SELECT * FROM userdesigns WHERE code='$code'" );
             while ($values=$sql2->fetch_assoc()){
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
</br>
    <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
        <div class="caption"> <div class="flip-card">
          <div class="flip-card-inner">
        <div class="aside">
       
            <div class="flip-card-front">
        <img class=" tumbnail thumbnail-2" name="img" 
        src="image/<?php echo $values["img"];?>"  width="240" height="250" />
        </div>
        </div>
        <div class="flip-card-back">

        <h5 class="text-center text-muted f">Designs type: <?php echo $values["type"]; ?></h5>
              <h7 class="text-center text-muted f">Designs size: <?php echo $values["size"]; ?></h7><br>
              <h7 class="text-center text-muted ">price: <?php echo $row["price"]; ?></h7><br>
              <h7 class="text-center text-muted f">Fabric Type : <?php echo $FabricType; ?></h7><br>

<h7 class="text-center text-muted f"> <?php echo $comment; ?></h7><br>.<br>.<br>
<h7 class="text-center text-muted f">hight= <?php echo $hight; ?>cm ,
Arm Length= <?php echo $armLength; ?>cm ,<br>
chest= <?php echo $chest; ?>cm ,
waist= <?php echo $waist; ?>cm ,
hip= <?php echo $hip; ?>cm
</h7><br>
            </div>
          </div>
        </div>
        <h5 class="text-center text-muted f">company name: <?php echo $values["companyname"]; ?></h5>

          <h4 class="text-center text-muted f">price: <?php echo $row["price"]; ?></h4>
          <h4 class="text-center text-muted f">Quantity of sale: <?php echo $row["quantity"]; ?></h4>

        </div>
        </div>
      </center>
    </div>
                    <?php }}?> <br>
