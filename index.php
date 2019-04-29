<?php
//must appear BEFORE the <html> tag
session_start();
include_once('include/config.php');

if (isset($_SESSION['valid_user'])) {
    header("location: home.php");
}
//make the database connection
$conn  = db_connect();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $first_name = $conn -> real_escape_string($_POST['first_name']);
    $password = $conn -> real_escape_string($_POST['password']);

    //make a query to check if user login successfully
    $sql = "select * from users where first_name='$first_name' and password='$password'";
    $result = $conn -> query($sql);
    $numOfRows = $result -> num_rows;
    $row = $result -> fetch_assoc();
    if ($numOfRows == 1) {
        $_SESSION['valid_user'] = $first_name;
        header("location: home.php");
    }else {

		 $error = 'Your Login Name or Password is invalid';
			
    }
}
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
	
<link rel="stylesheet" href="css/login.css" type="text/css">
<script type="text/javascript" src="js/login.js"></script>
<title>LINFOX</title>
</head>

<body>
<div class="cont">
	<form action="index.php" method="post">
  <div class="demo">
    <div class="login">
       <div class="login__check"><img src="images/linlogo2.png" alt=""></div>
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input" id="first_name" name="first_name" placeholder="Username" required />
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input" id="password" name="password" placeholder="Password" required />
        </div>
		  <input type="submit" id="submit" class="login__submit" value="Sign in" onClick="return validateInfo(document)" />
		
                    <?php
                    if(isset($error)) {
                        echo "<p> <font color=red size='4pt'>$error</p>";
                        unset($error);
                    }
                    ?>
                
      </div>
    </div>
    </div>
	</form>
    </div>
    
</body>
</html>
