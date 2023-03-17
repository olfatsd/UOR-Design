<?php
include "connection.php";

	if (isset($_GET['seemore'])) {
		$comanycode = $_GET['seemore'];
		$update1 = true;
		$record = mysqli_query($con,"SELECT * FROM companys WHERE comanycode=$comanycode");
        if ($record->num_rows == 1 ) {
			$up = mysqli_fetch_array($record);
            $companyname=$up['companyname'];
            $address=$up['address'];
            $email=$up['email'];
            $phone=$up['phone'];
		}
		
	} include "navbar.php";
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
<div class="container1 bootstrap snipets">
   <div class="row flow-offset-1">
<?php
 $sql2=$con->query("SELECT * FROM thedesigns WHERE comanycode='$comanycode'" );
          while ($row2=$sql2->fetch_assoc()){
            $image=$row2['image'];
 ?>
 <div class="col-xs-7 col-md-4">
    <div class="grid-item">
     <center>
        <div class="caption">
        <div class="aside">

       <img  name="img" src="image/<?php echo $row2["image"];?>"  width="230" height="260"  /><br>
       </div>
       <h4 class="text-center text-muted f">Type : <?php echo $row2["type"]; ?></h4>
       <h45 class="text-center text-muted f">size : <?php echo $row2["size"]; ?></h5>
       <h4 class="text-center text-muted f">price : <?php echo $row2["price"]; ?> ₪</h5>

      </div>
        </div>
       </center>
      <br>
      </div>
<?php }
	$sqlWin=$con->query("SELECT * FROM winning WHERE companyname='$companyname'");

   
   while ($sqlWin && $win=$sqlWin->fetch_assoc()){
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
                  <?php }?>
</div>
        </div>