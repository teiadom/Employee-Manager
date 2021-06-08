<?php
ob_start();
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>EMPLOYEE MANAGER</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>-->
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="js/jquery-func.js" type="text/javascript"></script>
	<style type = "text/css">
	
	  .container {
    width: 100%;
	margin-top: -125px;
	margin-left: -20px;
}

.image {
    width: 15%;
    max-width: 20%;
    display: block;
    float: left;
    margin-left: 10px;
}
.image2 {
    width: 15%;
    max-width: 20%;
    display: inline-block;
    float: right;
    margin-right: 10px;
}

.image img {
    width: 100%;
    height: auto;
}
.image2 img {
    width: 100%;
    height: auto;
}

.image:first-child {
    margin: 0;
}
.image2:first-child {
    margin: 0;
}
</style>

	<link rel="stylesheet" href="css/base.css">
	<!--<link rel="stylesheet" href="css/skeleton.css"-->
	<link rel="stylesheet" href="css/layout.css">
</head>
<body style="background-image:url('css/images/bg_image.jpg'); background-repeat: repeat-x; ">

<div class="header-bar clearfix">
	  
	 <img src="css/images/head2.png" style= "width:100%; height:150px;" alt="" class="logo">
	  
	  </div>
	<div class="notice">
	<?php
		
		if(isset($_POST['submit'])){
		require_once ('mysql_connect.php');
			if(empty($_POST['username']) || empty($_POST['pass']) ){
			$u = $p = FALSE;
			echo "<p class='warn'>Whoops! Fill in All Fields. Please try again.</p>";
		}
		else{
			$u = mysql_real_escape_string ($_POST['username'], $dbc);
			$p = mysql_real_escape_string ($_POST['pass'],$dbc);
		}
			if ($u && $p) { // If everything's OK.
			
				$t = "SELECT * FROM user WHERE (username='$u' AND password='$p')";		
				$r = mysql_query ($t,$dbc) or trigger_error("Query: $q\n<br />MySQL Error: " . mysql_error($dbc));
				
				if (mysql_num_rows($r) == 1) { // A match was made.

					// Register the values & redirect:
					$_SESSION = mysql_fetch_array ($r); 
					mysql_free_result($r);
									
					$url = 'home.php'; 
					ob_end_clean(); // Delete the buffer.
					header("Location: $url");
					exit(); // Quit the script.
						
				} else { // No match was made.
					echo '<p class="erorr">Either the username and password entered do not match those in the system </p><br/>';
				}
				
			} 
			else { // If everything wasn't OK.
				//echo '<p class="error">Please try again.</p>';
			}
	
	mysql_close($dbc);
		}
		?>
	</div>

	<div class="container">
		
		<div class="form-bg" >
			<form action= "index.php" method ="post">
				<h2>Login</h2>
				<p><input type="text" placeholder="Username" name="username" id="username"></p>
				<p><input type="password" placeholder="Password" name="pass" id="pass"></p>
				
				<button type="submit" name="submit" id="submit"></button>
			</form>
		</div>

	
		</div><!-- container -->

	
<!-- End Document -->
<!--div class="footer-bar">
  <div class="foot content clearfix">
  <ul>
  <li>&copy; 2013 Fixed Assets Manager</li>
  
  </ul>
  
  </div>
</div>-->
</body>
</html>
<?php // Flush the buffered output.
ob_end_flush();
?>