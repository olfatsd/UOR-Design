<?php
include "connection.php";

	if (isset($_GET['edit'])) {
		$careerCode = $_GET['edit'];
		$update1 = true;
		$record = mysqli_query($con,"SELECT * FROM careers WHERE careerCode=$careerCode");

		if ($record->num_rows == 1 ) {
			$up = mysqli_fetch_array($record);
            $typeJop=$up['typeJop'];
            $advantages=$up['advantages'];
            $bid=$up['bid'];
            $location=$up['location'];

		}
	} 
   
?>

<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">	
<?php 

    include 'comnavbar.php';
    ?><br>


  <div class="form-style-8">
	  <h1>Edit the Job
      </h1>
	  <form method="POST" enctype="multipart/form-date">
 	 <input type="hidden" name="careerCode"  value="<?php echo $careerCode; ?>">
	  <h6>update the type of the Job</h6>
	  <input type="text" name="typeJop" placeholder="Edit product price" value="<?php echo $typeJop; ?>">
	  <br>
	  <h6>update advantages</h6>

      <input type="text" name="advantages" placeholder="Edit product quality" value="<?php echo $advantages; ?>">
      <br>
	  <h6>update bid</h6>
      <input type="text" name="bid" placeholder="Edit job bid" value="<?php echo $bid; ?>">
      <br>
	  <h6>update the location</h6>
      <input type="text" name="location" placeholder="Edit location" value="<?php echo $location; ?>">
<br>
      <button class="btn" type="submit" name="update"  >update</button>
	 </div>
  </form>