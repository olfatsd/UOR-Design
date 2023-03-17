<?php 
session_start();
include "connection.php";
$comanycode=$_SESSION['comanycode'];

$email=$_SESSION['email'];
if(isset($_SESSION['email'])){
    $comanycode=$_SESSION['comanycode'];
if(isset($_POST['addCareer'])){
    $typeJop=$_POST['typeJop'];
    $advantages=$_POST['advantages'];
    $bid=$_POST['bid'];
    $location=$_POST['location'];

$career="INSERT INTO careers(comanycode,typeJop,advantages,bid,location) 
    values('$comanycode','$typeJop','$advantages','$bid','$location')";
    $result = $con->query($career);
    if ($result){
        header("location:compage.php");
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
th:hover {background-color: coral;}

  .f{
    font-family:cursive	;
    color: #738E49;
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
  background-image: url("image/career.jpg");
  
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
</style>
<?php include 'comnavbar.php';?><br>

<div class="bg-image"></div>

<div class="bg-text">
  <h2 style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">Looking For Employees</h1>
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

                <p class="text-center h2 f">ADD A NEW JOP</p>

                <form method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="typeJop" class="form-control" />
                      <label class="form-label f" for="typeJop">Type Jop </label>
                     
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <textarea class="form-control" name="advantages" rows="3" placeholder="Type your message here..."></textarea>

                      <label class="form-label f" for="advantages">Advantages</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" name="location" class="form-control" />
                      <label class="form-label f" for="location">Location</label>
                    </div>
                  </div>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" name="bid" class="form-control" />
                      <label class="form-label f" for="Bid">Bid</label>
                     
                    </div>
                    <br>
                    <input type="hidden"  name="comanycode" value='<?php echo $comanycode; ?>' >

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg" type="submit"  name="addCareer">Send</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="image/career.jpg" class="img-fluid" alt="Sample image"   width="110%" height="60%">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><br><br>