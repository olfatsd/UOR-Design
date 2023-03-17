<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
<?php
    require('connection.php');
if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $fullname= $_POST['fullname'];
    $address = $_POST['address'];
    $password= $_POST['password'];
    $comment= $_POST['comment'];
    $image= $_POST['image'];
    $gender= $_POST['gender'];

    $check="SELECT * FROM registeration WHERE email = '$email'";
    $rs = mysqli_query($con,$check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    //כאן בודקת אם המייל קיים במערכת אז הוא חייב להכניס מייל אחר 
    if($data[0] > 1) {
      echo '<div class="alert alert-success alert-dismissible mt-2">
<button tybe="button" class="close" data=dismiss="alert">x</button>
<strong>User Already in Exists tey again</strong>
</div>';
    }
else{
    if(!empty($email) && !empty($password)&&!empty($address)&&!empty($comment)&&!empty($fullname)
        &&!empty($gender)&&!empty($image))
    {
        $sql = "INSERT INTO registeration(fullname,email,password,address,comment,gender,image)
   VALUES('$fullname','$email','$password', '$address','$comment','$gender','$image')";
        $result = $con->query($sql);
        if ($result){
             header("location:loginUser.php");
        } 
    }
else
    {
  echo '<div class="alert alert-success alert-dismissible mt-2">
<button tybe="button" class="close" data=dismiss="alert">x</button>
<strong>Please enter some valid information!</strong>
</div>';
    }
}}

   
   
?>
    <form class="form"  method="POST">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" id="fullname" name="fullname" placeholder="Designer Name" required />
        <input type="email" class="login-input" id="email" name="email" placeholder="Email">
        <input type="password" class="login-input" id="password" name="password" placeholder="Password">
		<input type="text" class="login-input" id="address" name="address" placeholder="address">
		<input type="text" class="login-input" id="comment" name="comment" placeholder="comment">
        <label for="">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
		<input type="file" class="login-input" id="image" name="image" placeholder="image"><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="loginUser.php">Click to Login</a></p>
    </form>

</body>
</html>