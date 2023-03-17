<?php
session_start();
include "connection.php";
$comanycode2=$_SESSION['comanycode'];
$companyname=$_SESSION['companyname'];

$email=$_SESSION['email'];
if(isset($_SESSION['email'])){
    $comanycode2=$_SESSION['comanycode'];

    if(isset($_POST['addChat'])){
        $chat=$_POST['chat'];
        $comanycode2=$_POST['comanycode'];
        $auctionCode=$_POST['auctionCode'];
    $sql="INSERT INTO chatroom(chat,auctionCode,comanycode) values('$chat','$auctionCode','$comanycode2')";
        $res = $con->query($sql);
        if ($res){
            '<div class="alert alert-success alert-dismissible mt-2">
            <button tybe="button" class="close" data=dismiss="alert">x</button>
            <strong>Message sent successfully</strong>
            </div>';
        }
        else{
          //Error
       $error = mysqli_error($con);
       print("Error Occurred: ".$error);
       //Closing the connection
       mysqli_close($con);
        }
    }
if (isset($_GET['auctionChat2'])) {
    $auctionCode = $_GET['auctionChat2'];
    $update1 = true;
    $record = mysqli_query($con,"SELECT * FROM addtoauction WHERE auctionCode='$auctionCode'");
    if ($record->num_rows == 1 ) {
        $up = mysqli_fetch_array($record);
       $auctionCode=$up['auctionCode'];
       			
        $img=$up['img'];
        $comment=$up['comment'];
        $size=$up['size'];
        $FabricType=$up['FabricType'];
        $style=$up['style'];
        $color=$up['color'];
        $StartingPrice=$up['StartingPrice'];
        $messageStatus=$up['messageStatus'];
    }
    
}
   
   
$sql2=$con->query("SELECT * FROM addtoauction WHERE auctionCode='$auctionCode'" );

          while ($row2=$sql2->fetch_assoc()){
              $auctionCode=$row2['auctionCode'];
            $img=$row2['img'];
            $comment=$row2['comment'];
            $size=$row2['size'];
            $FabricType=$row2['FabricType'];
            $style=$row2['style'];
            $color=$row2['color'];
            $StartingPrice=$row2['StartingPrice'];
            $messageStatus=$row2['messageStatus'];

?>


<html>
<head>
  
</head>
<meta name="viewport" content="width=device-width">

    <title>U'R DESIGN</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="chat.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    button {
  width: 20%;
  padding: 10px;
  margin-top: 20px;
  border-radius: 20px;
  border: none;
  border-bottom: 4px solid #3e4f24;
  background: #5a7233; 
  font-size: 14px;
  font-weight: 100;
  color: #fff;
  }
  button:hover {
  background: #3e4f24;
  } 
</style>
<body >
 
<?php
 include "comnavbar.php";
 ?>
 <div class="bg-image"></div>

<div class="bg-text">
  <h2 class=" f" style="color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">U`R DESIGN</h2>
  <h1 class=" f"  style="font-size:50px;color:#b7aa8d; -webkit-text-stroke-width:1px; -webkit-text-stroke-color:#ffffff">STATISTICS</h1>
</div>
<br><br>
<div class="container">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Chat App</h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                    <center>
		<img class="product tumbnail thumbnail-3" width="260" height="350"
         src="image/<?php echo $up["img"]; ?>"  /></center> 
         <h7 class="text-center text-muted f"> <?php echo  $comment; ?></h7><br>

<h7 class="text-center text-muted f">Design style : <?php echo $style; ?></h7><br>
<h7 class="text-center text-muted f">Fabric Type : <?php echo $FabricType; ?></h7><br>
<h7 class="text-center text-muted f">Design size : <?php echo $size; ?></h7><br>
<h7 class="text-center text-muted f">Design color : <?php echo $color; ?></h7><br>
<h7 class="text-center text-muted f">Design Starting Price : <?php echo $StartingPrice; ?></h7><br>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                        
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>To: <span class="name">Emily 
                                    <br><?php echo $messageStatus; ?>
                                </span></span>
                            </div><div class="chat-container">
                            <?php
                        $sqlChat=$con->query("SELECT * FROM chatRoom WHERE auctionCode='$auctionCode' ORDER BY chatTime ASC "  );
                        while ($rowChat=$sqlChat->fetch_assoc()){
                          $auctionCode=$rowChat['auctionCode'];
                          $comanycode=$rowChat['comanycode'];
                          $chat=$rowChat['chat'];
                          $chatTime=$rowChat['chatTime'];
                          $company=$con->query("SELECT * FROM companys WHERE comanycode='$comanycode'" );
                          while ($rowcompany=$company->fetch_assoc()){
                            $companyname=$rowcompany['companyname'];
                            $comanycode=$rowcompany['comanycode'];
                            $companydesinger=$con->query("SELECT * FROM thedesinger WHERE comanycode='$comanycode'" );
                          while ($rowdesiger=$companydesinger->fetch_assoc()){
                              $img=$rowdesiger['img'];                        ?>
                            
                                <ul class="chat-box chatContainerScroll">
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="image/<?php echo $rowdesiger["img"]; ?>" alt="Retail Admin">
                                            <div class="chat-name "><h8><?php echo $companyname; ?></h8></div>
                                        </div>
                                        <div class="chat-text"><?php echo $chat; ?></div>
                                        <div class="chat-hour"><?php echo $chatTime; ?> <span class="fa fa-check-circle"></span></div>
                                    </li>
                                    
                                    <?php 
         }} }  ?>
                                  
                                </ul>
                                <div class="form-group mt-3 mb-0">
                               <br>
                               <?php
                               if(!($messageStatus=="Reasonable price")){
                               ?>
                               <form method="POST">   
                                 <textarea class="form-control" name="chat" rows="3" placeholder="Type your message here..."></textarea>

    <input type="hidden"  name="auctionCode" value='<?php echo $row2['auctionCode']; ?>' >
    <input type="hidden"  name="comanycode" value='<?php echo $comanycode2; ?>' >

    <button type="submit"  name="addChat" >sent</button><br>

                               <form><?php
                               }
                            
                               else{
                                $name="SELECT * FROM winning WHERE companyname='$companyname'";
                                $result2 = $con->query($name);
                                while ($result2 && $val=$result2->fetch_assoc()){ 
                                    $companyname2=$val['companyname'];
                                    if( $companyname ==$companyname2 ){
                                        echo '<h3 style="color:red" class="f" >Congratulations you won </h3>';
                                    }
                                    else{ 
                                   echo 'Reasonable price ';
                               }}}}
                               ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>
<?php


}
?>
</body>
</html>