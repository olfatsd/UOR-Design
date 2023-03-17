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
.solid {border-style: solid;}
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
<img class="d-flex ml-3" src="image/8" alt="Generic placeholder image" style="width:100%"><br>
<?php
$rowSQL =  "SELECT MAX( ratenum ) AS maxrate FROM rating ;";
$result = $con->query($rowSQL);
$row =  mysqli_fetch_array( $result );
$largestNumber = $row['maxrate'];
//echo '<h2>the large num'.$largestNumber.'<h2>';
$serch="SELECT * FROM  rating WHERE ratenum='$largestNumber';";
$result2 = $con->query($serch);
while ($result2 && $row2=$result2->fetch_assoc()){ 
    $code = $row2['code'];
    $ratenum=$row2['ratenum'];
$selectthedress="SELECT * FROM userdesigns WHERE code='$code';";
$res=$con->query($selectthedress);
while ($res && $row3=$res->fetch_assoc()){ 
    $img = $row3['img'];
    $FabricType = $row3['FabricType'];
    $id = $row3['id'];
    $companyname= $row3['companyname'];
$selecttheuser="SELECT * FROM registeration WHERE id='$id';";
$resUser=$con->query($selecttheuser);
while ($resUser && $rowUser=$resUser->fetch_assoc()){ 
    $fullname=$rowUser['fullname'];
    $email=$rowUser['email'];
    $address=$rowUser['address'];
    $image=$rowUser['image'];
    $comment=$rowUser['comment'];

?>

<h2>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container solid">
    <div class="row">
        <div class="col-sm-2 col-md-2">
        <img class="img-rounded img-responsive" name="img" src="image/<?php echo $rowUser["image"];?>"  /><br>
        </div>
        <div class="col-sm-4 col-md-5">
            <blockquote>
                <h4><?php echo $rowUser["fullname"]; ?>
                 <small>
                     <cite title="Source Title"><i class="glyphicon glyphicon-map-marker"></i>
                     <?php echo $rowUser["address"]; ?>
                      <br>
                    
             <i class="glyphicon glyphicon-envelope"></i> <?php echo $rowUser["email"]; ?> 
                </cite></h4>
                </small>
            </blockquote><h4><br
                /> <i class="glyphicon glyphicon-lock"></i> Company Name - <?php echo $row3["companyname"];?>
               <br />  </i>Desinge Type - <?php echo $row3["type"];?><br>
               Desinge Fabric Type - <?php echo $row3["FabricType"];?><br>
                Rate Number - <?php echo $row2["ratenum"];?>/10
                <br>
                Price - <?php echo $row2["price"];?> ₪
            </h4>
                <img class="img-rounded img-responsive" name="img" src="image/<?php echo $row3["img"];?>"  /><br>

        </div>
      
    </div>
</div>
 
<?php } } }?>
<br>