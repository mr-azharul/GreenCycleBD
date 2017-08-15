<?php
	include("config.php");
?>
<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Green Cycle Bangladesh">
    <meta property="article:publisher" content="http://www.greencyclebd.com/" />
    <meta property="article:author" content="http://www.greencyclebd.com/" />
    <meta name="description" content="Green Cycle Bangladesh - It's just one click matters, Buy & Sell Your Profession & Products from Green Cycle. ">
    <meta name="keywords" content="Buy Profession Bangladesh, Sell Profession Bangladesh, Jobs in Bangladesh, Sell Product in Bangladsh">

	<title>Green Cycle Bangladesh - A Golden Key To Success</title>

	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

	<!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div id="upper-manu"></div>
		<div id="upper-icon">
			<ul>
			  <li><a href="index.php" title="Home"><img src="img/003-internet.png"></a></li>
			  <li><a href="#search" title="Search"><img src="img/004-search.png"></a></li>
			  <li><a href="about.php" title="Info"><img src="img/001-info.png"></a></li>
			  <li><a href="#" title="Message Us"><img src="img/002-mail.png"></a></li>
			</ul>
		</div>
		<div id="logo">
			<a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Green Cycle Bangladesh"><img src="img/logo.png"></a>
		</div>
		<nav>
			<ul>
			  <li><a href="index.php" title="Home">Home</a></li>
			  <li><a href="about.php" title="About">About Us</a></li>
			  <li><a href="#" title="Career">Career</a></li>
			  <li><a href="contact.php" title="Contact">Contact</a></li>
			</ul>
		</nav>
	</header>
	<section id="full-body">
		<section id="under-header">
			<?php
				if (isset($_POST["login"])) {
					$user 	= $_POST["user"];
					$pass 	= $_POST["pass"];

					$email = "SELECT id, name, password, email, phone FROM signup WHERE email='$user' OR phone='$user'";
					$rs_email = mysqli_query($conn, $email);
					if (mysqli_num_rows($rs_email) > 0) {
					    $row = mysqli_fetch_assoc($rs_email);

					    if($row['email'] == $user || $row['phone'] == $user && $row['password'] == $pass) {
					    	session_start();
							$_SESSION["phone2"] = $row['phone'];
		    				echo "<script language=Javascript>document.location.href='preview.php'</script>";
					    } else {
					    	echo "<p style='color: red; text-align: center; padding: 5px; font-size: 16px; font-weight: 600;'>Wrong Password. Please Try Again!</p>";
					    }
					} else {
							echo "<p style='color: red; text-align: center; padding: 5px; font-size: 16px; font-weight: 600;'>Wrong Email or Phone. Please Try Again!</p>";
					}
				}

				session_start();
				if(isset($_SESSION['phone2']) == NULL){
			?>
			<div id="login">
				<form action="" method="post">
					<ul>
					  <li>
					  	<div class="form-group">
					      <input type="text" class="form-control" id="email" placeholder="Enter Email/ Phone Number"  name="user" required="1">
					    </div>
					  </li>
					  <li>
					  	<div class="form-group">
					      <input type="password" class="form-control" id="email" placeholder="Enter your Password"  name="pass" required="1">
					    </div>
					  </li>
					  <li>
					  	<button type="submit" class="btn btn-default" name="login" style="float: left;">Login</button>&nbsp;<a href="forget.php" style="float: right;">Forget Password</a>
					  </li>
					</ul>
				</form>
			</div>
			<?php } else { 
					$phn 		= $_SESSION['phone2'];
					$phn_name 	= "SELECT * FROM signup WHERE phone='$phn'";
					$rs_phn 	= mysqli_query($conn, $phn_name);
					$phn_row 	= mysqli_fetch_assoc($rs_phn);
					$us_name 	= $phn_row['name'];
					$us_pic 	= $phn_row['pic'];
			?>
			<div id="if">
				<div class="dropdown">
				  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background: #4A8907; color: white;"><img src="<?php echo $us_pic; ?>" class="img-circle" width="30" height="30"><?php echo " ".$us_name." "; ?><span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="preview.php">Profile</a></li>
				    <li><a href="#">Products</a></li>
				    <li class="divider"></li>
				    <li><a href="logout.php">Logout</a></li>
				  </ul>
				</div>
			</div>
			<?php } ?>
			</section>
		</section>
		<div id="lower-header"></div>

		<!-- Src Div-->
		<div class="container-fluid" id="search">
			<div class="row">
				<?php
					session_start();
					if(isset($_SESSION['phone2']) == NULL){
				?>
				<div class="col-sm-3" id="profile">
					<a href="signup.php"><button type="submit">Make a Professional Profile</button></a>
				</div>
				<?php } else { ?>
				<div class="col-sm-3" id="profile">
					<a href="signup.php"><button type="submit" style="text-decoration: line-through;" disabled>Make a Professional Profile</button></a>
				</div>
				<?php } ?>
				<div class="col-sm-6" id="src">
					<div class="container">
						<form action="" class="form-horizontal">
						    <div class="form-group">
						    	<div style="width: 50%">
						    		<input type="text" class="form-control" placeholder="Enter Name, Profession, Products etc" name="search" required="1">
						    	</div>
						    </div>
						    <div class="form-group"">
					    		<div style="width: 40%; float: left; padding-right: 20px;">
								  <select class="form-control" data-show-subtext="true" data-live-search="true">
								    <option value="" disabled selected>Select Location</option>
								    <?php
										$sql_parent = "SELECT * FROM parent_location ORDER BY name";
										$rs_parent  = mysqli_query($conn, $sql_parent);

										while($row_parent = mysqli_fetch_assoc($rs_parent)){
											$parent_id = $row_parent['id'];
									?>
								    <optgroup label="<?php echo $row_parent["name"];?>">
								    	<?php
								    		$sql_location = "SELECT * FROM location WHERE parent_id='$parent_id' ORDER BY name ASC";
											$rs_location = mysqli_query($conn, $sql_location);

											while($row_location=mysqli_fetch_assoc($rs_location)){
								    	?>
								    	<option value="<?php echo $row_location["id"];?>"><?php echo $row_location['name'];?></option>
								    	<?php } } ?>
								    </optgroup>
								  </select>
								</div>
						    	<button class="btn btn-default" type="submit">Search <i class="glyphicon glyphicon-search"></i></button>
					    	</div>
						</form>
					</div>
				</div>
				<div class="col-sm-3" id="product">
					<a href="#"><button type="submit">Place Your Product's</button></a>
				</div>
			</div>
		</div>