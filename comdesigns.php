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
	background-color: #232323;
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
<div class="container1 bootstrap snipets">
   
<div class="row flow-offset-3">
<?php
include "comnavbar.php";
	if(isset($_SESSION['email'])){
		$comanycode=$_SESSION['comanycode'];
    $companyname=$_SESSION['companyname'];
		$sql="SELECT * FROM companys WHERE comanycode= ?";
		$stmt= mysqli_stmt_init($con);
		$stmt = $con->prepare($sql);
		$stmt->bind_param("s", $comanycode);
		$stmt->execute();
		$res = $stmt->get_result();
		 
		 while ($res && $row=$res->fetch_assoc()){
			 $email=$row['email'];
			 $phone=$row['phone'];
             $sql2=$con->query("SELECT * FROM thedesinger WHERE comanycode='$comanycode'" );
             while ($row2=$sql2->fetch_assoc()){
               $img=$row2['img'];
               $desingerid=$row2['desingerid'];
               
?>
<div class="heero-image">
  <div class="hero-text">
    <h1 style="font-size:50px;color: #b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff;">Designs</h1>
   </div>
</div></br>
 <?php $sql3=$con->query("SELECT * FROM thedesigns WHERE comanycode='$comanycode'" );
                    while ($row3=$sql3->fetch_assoc()){
                    $image=$row3['image'];
                    $price=$row3['price'];
                    $type=$row3['type'];
                    $size=$row3['size'];
                    ?>
    <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
        <div class="caption">
        <div class="aside">
        <img class=" tumbnail thumbnail-2" name="img" 
        src="image/<?php echo $row3["image"];?>"  width="240" height="250" />
        </div>
         <h5 class="text-center text-muted f">Designs type: <?php echo $row3["type"]; ?></h5>
         <h6 class="text-center text-muted f">Designs size: <?php echo $row3["size"]; ?></h6>
          <h4 class="text-center text-muted f">price: <?php echo $row3["price"]; ?> ₪ </h4><span class="price">';
        </div>
        </div>
      </center>
    </div>
                    <?php }}}?> <br>
                    <?php


		
		$sqlWin="SELECT * FROM winning WHERE companyname= ?";
		$stmt= mysqli_stmt_init($con);
		$stmt = $con->prepare($sqlWin);
		$stmt->bind_param("s", $companyname);
		$stmt->execute();
		$reswin = $stmt->get_result();
		 
		 while ($reswin && $win=$reswin->fetch_assoc()){
			 $img=$win['img'];
			 $price=$win['price'];
			 $style=$win['style'];
          
               
?>
    <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
        <div class="caption">
        <div class="aside">
        <img class=" tumbnail thumbnail-2" name="img" 
        src="image/<?php echo $win["img"];?>"  width="240" height="250" />
      </div>
      <h3 class="text-center text-muted f">Auction Wnning Design</h3>

         <h5 class="text-center text-muted f">Designs type: <?php echo $win["style"]; ?></h5>
          <h4 class="text-center text-muted f">price: <?php echo $win["price"]; ?> ₪ </h4><span class="price">';
        </div>
        </div>
      </center>
    </div>
                    <?php }}?><br>
 <a class="nav-link f" href="addDesign2.php">
<div class="card">
  <div class="border">
		<center>
    <img class=" tumbnail thumbnail-3" name="img" 
        src="image/plus.png"  width="200" height="200"  style="border-radius: 80px"/></center>
    </div></a>
  </div>
</div>