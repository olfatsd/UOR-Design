<?php
	include "connection.php";
    session_start();
	$email=$_SESSION['email'];
	$comanycode=$_SESSION['comanycode'];
?>
	<style>
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
    width: 220px;
    height: 250px;
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
  .f{
    font-family:cursive	;
    color: #000;
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
  background-image: url("image/auction.jpg");
  
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

</style>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
 include "comnavbar.php";
 if(isset($_SESSION['email'])){
    $comanycode=$_SESSION['comanycode'];

           
?>
 
<div class="bg-image"></div>
<div class="bg-text">
  <h2 class=" f" style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 class=" f"  style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">AUCTION</h1>
</div>
<br><br>
</br>
 <?php $sql=$con->query("SELECT * FROM addtoauction" );
                    while ($values=$sql->fetch_assoc()){
                        $auctionCode=$values['auctionCode'];
                        $img=$values['img'];
                        $comment=$values['comment'];
                        $size=$values['size'];
                        $FabricType=$values['FabricType'];
                        $style=$values['style'];
                        $color=$values['color'];
                        $StartingPrice=$values['StartingPrice'];
                        $messageStatus=$values['messageStatus'];
                        $day=$values['day'];
                    ?>
    <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
        <div class="caption">
        <div class="aside">
        <div class="flip-card">
       <div class="flip-card-inner">
         <div class="flip-card-front">
        <img class=" tumbnail thumbnail-2" name="img" 
        src="image/<?php echo $values["img"];?>"  width="220" height="250" />
        </div>
        <div class="flip-card-back">

         <h5 class="text-center text-muted f"> <?php echo $values["comment"]; ?></h5>
         <h6 class="text-center text-muted f">Designs size: <?php echo $values["size"]; ?></h6>
         <h6 class="text-center text-muted f">Designs Fabric Type: <?php echo $values["FabricType"]; ?></h6>
         <h6 class="text-center text-muted f">Designs color: <?php echo $values["color"]; ?></h6>

         <h4 class="text-center text-muted f">Starting Price: <?php echo $values["StartingPrice"]; ?></h4><span class="price">';
        </div></div>
          </div>
       </div>
       <h5 class="text-center text-muted f"> <?php echo $values["comment"]; ?></h5>
       <h5 class="text-center text-muted f">Auction start date <br> <?php echo $values["day"]; ?></h5>
    
<?php echo '<a href="auctionChat2.php?auctionChat2='.$auctionCode.'" class="edit_btn" >'?>

<button class="btn btn-primary btn-lg" type="submit" >START AUCTION</button></a>
     </div>
        </div><br><br>
      </center>
    </div>
    <?php }}?> <br><br>
