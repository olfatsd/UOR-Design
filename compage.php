<?php
session_start();
$email=$_SESSION['email'];
$comanycode=$_SESSION['comanycode'];
include "connection.php";
$checkdesinger="SELECT * FROM thedesinger WHERE comanycode='$comanycode'" ;
						$res= mysqli_query($con,$checkdesinger);
						$data = mysqli_fetch_array($res, MYSQLI_NUM);
						if($data[0]<1){
              header("location:addDesinger.php");
            }
            else{
              echo'


<html>
<head>
<meta charset="utf-8">
    <title>UR DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="style2.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">-->
	 <script type = "text/javascript">
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 3000);
          }

          var images = [], x = -1;
          images[0] = "image/co.jpg";
          images[1] = "image/valentino.jpg";
          images[2] = "image/tommmy.jpg";
      </script>
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
.heroo-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("image/11.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("image/9.png");
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
</head>
<body onload = "startTimer()" style="background-color:#232323">
 ';
 include "comnavbar.php";
echo '
            <img src="image/8.jpg" width="100%" height="300" alt="mainpic">
        <p id="demo"></p>
    <!--------------pure-g-r div---------------------------->
<div style="margin:20px;padding:20px; border: 2px solid #ffffff">
 <div class="pure-g">
        <!--------------1/2 left div---------------------------->
        <div class="pure-u-1-2">
            <div class="container">
                <div class="content pure-u-1  picture_frame">
					<div class="middle">
						<h1 style="font-size:1300%;color:#232323; -webkit-text-stroke-width:4px; -webkit-text-stroke-color:#b7aa8d;">
							UR</br>
							DESIGN
						</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--------------1/2 right div---------------------------->
        <div class="pure-u-1-2">
            <div class="brand">
                <div class="content pure-u-1  picture_frame">
				  <center>
                    <div class="image">
                       <img id="img" src="image/tommmy.jpg" width="330" height="450" alt="private"/>
                    </div>
				  </center>
                </div>
			</div>
        </div>
    </div>
</div>
</br></br>
<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px;color: #b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff;">Designs</h1>
    <p>for details click here</p>
    <a class="nav-link f" href="comdesigns.php">
    <button style="background-color: #232323; border-radius: 12px; color: white; border: 2px solid #b7aa8d;">GO</button>
    </a>
  </div>
</div></br>
<div class="heroo-image">
  <div class="hero-text">
    <h1 style="font-size:50px;color: #b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff;">About Us</h1>
    <p>for details click here</p>
    <a class="nav-link f" href="coabout.php">

    <button  style="background-color: #232323; border-radius: 12px; color: white; border: 2px solid #b7aa8d;">GO</button>
    </a></div>
</div></br>
</br>
<center>

	<div class="pure-g" style="margin-bottom:100px">
	 <!--------------1/2 left div---------------------------->
        <div class="pure-u-1-2">
	
            <div class="brand">
                <div class="content pure-u-1  picture_frame">
                    <div class="brand">
						 <h3 style="color:white"><u>katreen fadel</u></h3>
                            <a   style="color:b7aa8d">E-mail : katreen.fa@gmail.com</a></br>
                            <a   style="color:b7aa8d">phone-number : 0529522059</a></br>
                            <a   style="color:b7aa8d">address : maghar city</a></br>
                    </div>
                </div>
            </div>
        </div>
        <!--------------1/2 right div---------------------------->
        <div class="pure-u-1-2">
            <div class="brand">
				 <h3 style="color:white"><u>olfat saad</u></h3>
                            <a  style="color:b7aa8d">E-mail : ulfatsaad97@gmail.com</a></br>
                            <a  style="color:b7aa8d">phone-number : 0585066442</a></br>
                            <a  style="color:b7aa8d">address : yanoh village</a></br>
                      
            </div>
        </div>
    </div>
	</center>

	</body>
	</html>';
   }?>