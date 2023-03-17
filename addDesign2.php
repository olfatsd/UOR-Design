<?php
session_start();
include "connection.php";
$comanycode=$_SESSION['comanycode'];

$email=$_SESSION['email'];
if(isset($_SESSION['email'])){
    $comanycode=$_SESSION['comanycode'];
if(isset($_POST['addNewDesign2'])){
    $image=$_POST['image'];
    $price=$_POST['price'];
    $type=$_POST['type'];
    $size=$_POST['size'];
        $sql="INSERT INTO thedesigns(image,price,type,size,comanycode) 
    values('$image','$price','$type','$size','$comanycode')";
    $res = $con->query($sql);
    if ($res){
        header("location:comdesigns.php");
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
<html>
<head>
  
</head>
<meta charset="utf-8">
    <title>U'R DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<body onload = "startTimer()" style="background-color:#232323">
 
<?php
 include "comnavbar.php";
 ?>
<section class="vh-50" style="background-color: #eee;">
  <div class="container h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">ADD NEW DESIGN</p>
            <form method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="type" class="form-control" />
                      <label class="form-label" for="type">Design Type</label>
                     
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="file" name="image" class="form-control" />

                      <label class="form-label" for="form3Example3c">Design Image</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" name="size" class="form-control" />
                      <label class="form-label" for="size">size</label>
                    </div>
                  </div>
                  <div class="form-outline flex-fill mb-0">
                      <input type="text" name="price" class="form-control" />
                      <label class="form-label" for="price">price</label>
                     
                    </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg" type="submit"  name="addNewDesign2">Add</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="image/12.jpg" class="img-fluid" alt="Sample image" style="width:110%">
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