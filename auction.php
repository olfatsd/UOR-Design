<?php
session_start();
include "connection.php";
$id=$_SESSION['id'];
$email=$_SESSION['email'];
if(isset($_SESSION['email'])){
    $id=$_SESSION['id'];
if(isset($_POST['addtoauction'])){
    $img=$_POST['img'];
    $comment=$_POST['comment'];
    $size=$_POST['size'];
    $FabricType=$_POST['FabricType'];
    $style=$_POST['style'];
    $color=$_POST['color'];
    $StartingPrice=$_POST['StartingPrice'];
    $messageStatus=$_POST['messageStatus'];
$sql="INSERT INTO addtoauction(id,img,comment,size,FabricType,color,StartingPrice,style,messageStatus) 
    values('$id','$img','$comment','$size','$FabricType','$color','$StartingPrice','$style','No suitable price received yet')";
    $res = $con->query($sql);
    if ($res){
        header("location:auctionChat.php");
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

	<style>
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
<html>
<head>
  
</head>
<meta charset="utf-8">
    <title>U'R DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<body onload = "startTimer()" >
 
<?php
 include "navbar.php";
 ?>
 <div class="bg-image"></div>

<div class="bg-text">
  <h2 class=" f" style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 class=" f"  style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">STATISTICS</h1>
</div>
<br><br>
<section class="vh-50" style="background-color: #eee;">
  <div class="container h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h2 f">ADD NEW DESIGN FOR AUCTION</p>

                <form method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="comment" class="form-control" />
                      <label class="form-label f" for="type">Add comment</label>
                     
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="file" name="img" class="form-control" />

                      <label class="form-label f" for="form3Example3c">Design Image</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" name="color" class="form-control" />
                      <label class="form-label f" for="color">color</label>
                    </div>
                  </div>
                  
                    <div class="form-outline flex-fill mb-0">

                    
                                <select name="style" class="form-control f">
                                    <option value="">--Select Style--</option>
                                    <option value="casual">casual</option>
                                    <option value="elegant">elegant</option>
                                    <option value="sportwear">sportwear</option>
                                    <option value="dress">dress</option>
                                </select><label for="">Style</label> </div><br>

                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="FabricType" class="form-control" />
                      
                      <label class="form-label f" for="FabricType">Fabric Type</label>
                     
                    </div>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="StartingPrice" class="form-control" />
                      
                      <label class="form-label f" for="StartingPrice">Starting Price</label>
                     
                    </div>
                    <div class="form-outline flex-fill mb-0">
                      <table>
                        <tr>
                          <td><h7>size</h7</td>
                         
                        </tr>
                        <tr>
                          <td><input type="number" name="size" style="width:50px"></td>
                    

                        </tr>
                      </table>
                    </div>
                    <br>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg" type="submit"  name="addtoauction">Add TO AUCTION</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="image/12.jpg" class="img-fluid" alt="Sample image"   width="115%" height="90%">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>