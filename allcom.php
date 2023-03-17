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
<h2>ALL COMPANYS</h2>

<table>
  <tr>
    <th>Comany Code</th>
    <th>Company Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Phone</th>

</tr>
  <?php
$sql="SELECT * FROM companys";
$result = $con->query($sql);
while ($result && $row=$result->fetch_assoc()){ 
    $companyname=$row['companyname'];
    $comanycode=$row['comanycode'];
    $address=$row['address'];
    $email=$row['email'];
    $phone=$row['phone'];
?>
  <tr>
    <td>#<?php echo $row["comanycode"]; ?></td>
    <td><?php echo $row["companyname"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["phone"]; ?></td>
  </tr>
  <?php } ?>
</table>
</center>
<br>