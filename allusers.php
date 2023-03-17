<?php 
include "connection.php";
?>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  font-family: URW Chancery L, cursive;
}
.f2{
    font-family:URW Chancery L, cursive;
}
tr:hover {background-color: coral;}
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
</nav><br>
<img class="d-flex ml-3" src="image/8" alt="Generic placeholder image" style="width:100%">
<br><center>
<h2 class="f2">ALL Designers</h2>

<table>
  <tr>
    <th>Designer id</th>
    <th>Designer Name</th>
    <th>Designer image</th>
    <th>Email</th>
    <th>Address</th>
    <th>gender</th>

</tr>
  <?php
$sql="SELECT * FROM registeration";
$result = $con->query($sql);
while ($result && $row=$result->fetch_assoc()){ 
    if(!($row['email']=="admin@gmail.com")){
    $fullname=$row['fullname'];
    $id=$row['id'];
    $address=$row['address'];
    $email=$row['email'];
    $gender=$row['gender'];
    $image=$row['image'];

?>
  <tr>
    <td>#<?php echo $row["id"]; ?></td>
    <td><?php echo $row["fullname"]; ?></td>
    <td>
    <img class=" tumbnail thumbnail-3" name="img" src="image/<?php echo $row["image"];?>"  width="90" height="100" /><br>
</td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["gender"]; ?></td>
  </tr>
  <?php }} ?>
</table>
</center>
<br>