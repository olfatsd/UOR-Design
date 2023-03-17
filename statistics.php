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
th:hover {background-color: coral;}

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
<br><br>

 <center><table>
   
  <tr>
    <th><a href="TopRating.php">The Top Rating</a></th>
    <th><a href="bestSelling.php">The best-selling Design</a></th>
    <th><a href="theSales.php">The Sales</a></th>


</tr>
</table></center>