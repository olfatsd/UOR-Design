
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('connection.php');
    // When form submitted, insert values into the database. 	style
    if (isset($_REQUEST['submit'])) {
        // removes backslashes
        $companyname = stripslashes($_REQUEST['companyname']);
        //escapes special characters in a string
        $companyname = mysqli_real_escape_string($con, $companyname);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		$address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
		$email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $phone    = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);
        $style    = stripslashes($_REQUEST['style']);
        $style    = mysqli_real_escape_string($con, $style);
        $check="SELECT * FROM companys WHERE  companyname='$companyname'";
        $res = mysqli_query($con,$check);
        $data = mysqli_fetch_array($res, MYSQLI_NUM);
        //כאן בודקת אם המייל קיים במערכת אז הוא חייב להכניס מייל אחר 
        if($data[0] > 1) {
          echo '<div class="alert alert-success alert-dismissible mt-2">
    <button tybe="button" class="close" data=dismiss="alert">x</button>
    <strong>Company Already in Exists tey again</strong>
    </div>';}
else{
        $query    = "INSERT into `companys` (companyname, password, address, email,phone,style)
                     VALUES ('$companyname','$password','$address','$email','$phone','$style')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='loginCompany.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='comSinup.php'>registration</a> again.</p>
                  </div>";
        }
    }} else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="companyname" placeholder="companyname" required />	
        <input type="text" class="login-input" name="email" placeholder="Email">
		<input type="text" class="login-input" name="address" placeholder="address">		
        <input type="phone" class="login-input" name="phone" placeholder="phone">

        <input type="password" class="login-input" name="password" placeholder="password">
        <label for="">Style</label>
                                <select name="style" class="form-control">
                                    <option value="">--Select Style--</option>
                                    <option value="casual">casual</option>
                                    <option value="elegant">elegant</option>
                                    <option value="sportwear">sportwear</option>
                                    <option value="dress">dress</option>
                                </select><br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="loginCompany.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>