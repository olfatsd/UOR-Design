<?php
session_start();
include "connection.php";
$id=$_SESSION['id'];
$email=$_SESSION['email'];

if (isset($_GET['auctionChat'])) {
    $auctionCode = $_GET['auctionChat'];
    $update1 = true;
    $record = mysqli_query($con,"SELECT * FROM addtoauction WHERE auctionCode=$auctionCode");
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

if(isset($_SESSION['email'])){
    $id=$_SESSION['id'];
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
  .button2 {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button2:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>
<body >
 
<?php
 include "navbar.php";
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
                                <span>To: <span class="name">Emily Russell
                                    <br><?php echo $messageStatus; ?>
                                </span></span>
                            </div><div class="chat-container">
                            <?php
                        $sqlChat=$con->query("SELECT * FROM chatRoom WHERE auctionCode='$auctionCode'" );
                        while ($rowChat=$sqlChat->fetch_assoc()){
                          $auctionCode=$rowChat['auctionCode'];
                          $comanycode=$rowChat['comanycode'];
                          $chat=$rowChat['chat'];
                          $chatTime=$rowChat['chatTime'];
                          $company=$con->query("SELECT * FROM companys WHERE comanycode='$comanycode'" );
                          while ($rowcompany=$company->fetch_assoc()){
                            $companyname=$rowcompany['companyname'];
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
         }}  } ?>
                                  
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
                               <br>
                               <?php
                               if(!($messageStatus=="Reasonable price")){
                                
                               ?>
                               <form method="POST">
    <input type="hidden"  name="auctionCode" value='<?php echo $row2['auctionCode']; ?>' >
    <?php echo '<a href="sentto.php?sentto='.$auctionCode.'" class="edit_btn" >'?>
                               <button   type="button" name="Reasonable" onClick="#popup1" >Reasonable price</button><br>
                               <a>
        </form><?php }
        else{
          $name="SELECT * FROM winning WHERE auctionCode='$auctionCode'";
                                $result2 = $con->query($name);
                                while ($result2 && $val=$result2->fetch_assoc()){ 
                                    $companyname2=$val['companyname'];
                                    echo '<h3 style="color:red" class="f" >Congratulations '.$companyname.' company for winning </h3>';
                
        }}
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
}}
?>
</body>
</html>