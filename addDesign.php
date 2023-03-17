<?php
include "connection.php";
session_start();
$id=$_SESSION['id'];
$email=$_SESSION['email'];
if(isset($_SESSION['email'])){
    $id=$_SESSION['id'];
if(isset($_POST['addNewDesign'])){
    $type=$_POST['type'];
    $img=$_POST['img'];
    $companyname=$_POST['companyname'];
    $comment=$_POST['comment'];
    $size=$_POST['size'];
    $FabricType=$_POST['FabricType'];
    $hight=$_POST['hight'];
    $armLength=$_POST['armLength'];
    $chest=$_POST['chest'];
    $waist=$_POST['waist'];
    $hip=$_POST['hip'];
    $style=$_POST['style'];
    $sql="INSERT INTO userdesigns(id,type,img,companyname,comment,size,FabricType,hight,armLength,chest,waist,hip,style) 
    values('$id','$type','$img','$companyname','$comment','$size','$FabricType','$hight','$armLength','$chest'
    ,'$waist','$hip','$style')";
    $res = $con->query($sql);
    if ($res){
        header("location:profile.php");
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
 include "navbar.php";
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
                      <input type="file" name="img" class="form-control" />

                      <label class="form-label" for="form3Example3c">Design Image</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <select class="form-control form-control-lg" name="companyname">
                       <?php
                       $coname="SELECT companyname,comanycode FROM companys";
                       $result = $con->query($coname);
                       while ($result && $row=$result->fetch_assoc()){ 
                        $companyname=$row['companyname'];
                        $comanycode=$row['comanycode'];

                       ?>             
                      <option value="<?php echo $row["companyname"]; ?>" >
                      <?php
                      echo $row["companyname"];
                      ?> </option>
                    <?php } ?>
                                </select>
                      <label class="form-label" for="companyname">company name</label>
                    </div>
                  </div>
                  <div class="form-outline flex-fill mb-0">
                      <input type="text" name="comment" class="form-control" />
                      
                      <label class="form-label" for="comment">Add comment</label>
                     
                    </div>
                    <div class="form-outline flex-fill mb-0">

                    
                                <select name="style" class="form-control">
                                    <option value="">--Select Style--</option>
                                    <option value="casual">casual</option>
                                    <option value="elegant">elegant</option>
                                    <option value="sportwear">sportwear</option>
                                    <option value="dress">dress</option>
                                </select><label for="">Style</label> </div><br>

                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="FabricType" class="form-control" />
                      
                      <label class="form-label" for="FabricType">Fabric Type</label>
                     
                    </div>
                    <div class="form-outline flex-fill mb-0">
                      <table>
                        <tr>
                          <td><h7>size</h7</td>
                          <td><h7>hight</h7</td>
                          <td><h7>Arm <br>Length </h7</td><br>
                          <td><h7>chest</h7</td>
                          <td><h7>waist</h7</td>
                          <td><h7>hip</h7</td>
                        </tr>
                        <tr>
                          <td><input type="number" name="size" style="width:50px"></td>
                          <td><input type="number" name="hight" style="width:50px"></td>
                          <td><input type="number" name="armLength" style="width:50px"></td><br>
                          <td><input type="number" name="chest" style="width:50px"></td>
                          <td><input type="number" name="waist" style="width:50px"></td>
                          <td><input type="number" name="hip" style="width:50px"></td>

                        </tr>
                      </table>
                    </div>
                    <br>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg" type="submit"  name="addNewDesign">Add</button>
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