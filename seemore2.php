<?php
session_start();
include "connection.php";
$comanycode=$_SESSION['comanycode'];
$email=$_SESSION['email'];
if (isset($_GET['seemore2'])) {
		$code = $_GET['seemore2'];
		$update1 = true;
		$record = mysqli_query($con,"SELECT * FROM userdesigns WHERE code=$code");
       // $code=$_SESSION['code'];
        if ($record->num_rows == 1 ) {
			$values = mysqli_fetch_array($record);
            $code=$values['code'];
            $id=$values['id'];
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
            $style=$values['style'];

          }		
	} include "comnavbar.php";
   
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
<?php


 $sql2=$con->query("SELECT * FROM userdesigns WHERE code='$code'" );
          while ($row2=$sql2->fetch_assoc()){
            $code=$row2['code'];
            
            $_SESSION['code'] = $row2['code'];
            $code=$row2['code'];
            $id=$row2['id'];
            $img=$row2['img'];
            $type=$row2['type'];
            $companyname=$row2['companyname'];
            $comment=$row2['comment'];
            $size=$row2['size'];
            $FabricType=$row2['FabricType'];
            $hight=$row2['hight'];
            $armLength=$row2['armLength'];
            $chest=$row2['chest'];
            $waist=$row2['waist'];
            $hip=$row2['hip'];
            $style=$row2['style'];
            $sql=$con->query("SELECT * FROM registeration WHERE id='$id'" );
            if(isset($_SESSION['email'])){
                $comanycode=$_SESSION['comanycode'];
                if(isset($_POST['save'])){
                    //$code=$_POST['code'];
                    $ratenum=$_POST['ratenum'];
                    //$comanycode=$_POST['comanycode'];
                    $price=$_POST['price'];
                    $sql3="INSERT INTO rating(code,comanycode,ratenum,price) 
                    values('$code','$comanycode','$ratenum','$price')";
                   
                    if( $ratenum>0 & $ratenum<11){ 
                    $res = $con->query($sql3);
                    if ($res ){
                        header("location:Designersrequests.php");
                    }
                    else{
                      //Error
                   $error = mysqli_error($con);
                   print("Error Occurred: ".$error);
                   //Closing the connection
                   mysqli_close($con);
                    }}
                }
            }
            while ($row=$sql->fetch_assoc()){
                $fullname=$row['fullname'];
                $email=$row['email'];
                $address=$row['address'];
                $gender=$row['gender'];
      
 ?> <form method="post">
<div class="col-xs-7 col-md-5">
    <div class="grid-item">
     <center>
        <div class="caption">
        <div class="aside">

       <img style="float: left"  name="img" src="image/<?php echo $row2["img"];?>"  width="250" height="260"  /><br><br><br>
       </div>
       <h7 class="text-center text-muted f">Designer Name : <?php echo $fullname; ?></h7><br>
       <h7 class="text-center text-muted f">Designer email : <?php echo $email; ?></h7><br>
       <h7 class="text-center text-muted f">Designer address : <?php echo $address; ?></h7><br><br>

       <h6 class="text-center text-muted f">Design Type : <?php echo $type; ?></h6>
       <h6 class="text-center text-muted f">Design style : <?php echo $style; ?></h6>

       <h6 class="text-center text-muted f">Fabric Type : <?php echo $FabricType; ?></h6>
           <h7 class="text-center text-muted f"> <?php echo $comment; ?></h7><br>.
           <h8 class="text-center text-muted f">hight= <?php echo $hight; ?>cm ,
           Arm Length= <?php echo $armLength; ?>cm ,
           chest= <?php echo $chest; ?>cm ,
           waist= <?php echo $waist; ?>cm ,
           hip= <?php echo $hip; ?>cm
          </h8>
         <?php
         $checkstyle=$con->query("SELECT style FROM companys WHERE comanycode='$comanycode'" );
         while ($checkrow=$checkstyle->fetch_assoc()){
          $style=$checkrow['style'];
if($checkrow['style']==$row2['style']){
         ?>
          <table>
          <tr>
                <td><h8 class="text-center text-muted f">Rating 1-10 </h8></td>
                <td><input type="number" name="ratenum" style="width:70px"></td>
                </tr>
          <tr>
                <td><h8 class="text-center text-muted f">Price</h8></td>
                <td><input type="number" name="price" style="width:70px"></td>
            </tr>
           <br>    <br>
           <tr>
                <td> <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <input type="hidden" name="code" style="width:70px">

                <button class="btn btn-primary btn-lg" type="submit"  name="save">Save</button>
                  </div>
                </td>
            </tr>
          </table> 
           <?php
         }
        else{
          echo'<h5 class="text-center text-muted f" style="color:red">You can"t rate this design </h5>';
        }
        }
           ?>
             <br>
          
       </div>
        </div>
       </center>
      <br>
      </div> </form><br>
<?php } }?>
</div>
        </div>