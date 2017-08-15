<?php
	session_start();
	if(isset($_SESSION['phone2']) == NULL){
		header("Location: signup.php");
	}
	else {
		header( 'Content-Type: text/html; charset=utf-8' );
	}

	$u_phn = $_SESSION["phone2"];

	include("header.php");
?>

		<div class="container-fluid">
			<div class="row">
				<h3 align="center">Please Type All Information About You</h3>
				<p align="center">All Red Star Fields (<span style="color: red"> * </span>) Is Required.</p>
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="container">
				  	    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <div class="form-group">
						    <label class="control-label col-sm-1" for="email" style="text-align: left;">Email:</label>
						    <div class="col-sm-4">
						      <input type="email" class="form-control" name="email2" placeholder="Type Your Email">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-1" for="ph2" style="text-align: left;">Phone 2:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" name="ph2" placeholder="Type Your Phone Number">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-1" for="pic" style="text-align: left;"><span style="color: red">*</span> Profile Picture:</label>
						    <div class="col-sm-4"> 
						      <img class="profile-pic" src="img/avatar.jpg" />
						      <br>
								<input class="file-upload" name="image" type="file" required="1" accept="image/*"/>
						    </div>
						  </div><br>
						  <div class="form-group"> 
						    <div class="col-sm-offset-1 col-sm-4" align="right">
						      <button type="submit" class="btn btn-default" name="sub">Submit</button>
						    </div>
						  </div>
						</form>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div><br><br>

		<ul class="tags">
			  <li><a href="#" class="tag">Ambulance</a></li>
			  <li><a href="#" class="tag">Doctor</a></li>
			  <li><a href="#" class="tag">Hospital</a></li>
			  <li><a href="#" class="tag">Engineer</a></li>
			  <li><a href="#" class="tag">Student</a></li>
			  <li><a href="#" class="tag">More</a></li>
			  <li><a href="#" class="tag">Smart Phone's</a></li>
			  <li><a href="#" class="tag">Fashion</a></li>
			  <li><a href="#" class="tag">Business</a></li>
			  <li><a href="#" class="tag">Industry</a></li>
			  <li><a href="#" class="tag">More</a></li>
			</ul>
	</section>
	<br><br>

	<section id="pag">
		<div class="container">
			<div class="row">
				<div class="col-sm-6" style="padding: 5px; text-align: center;">
					<a href="#">View All Professional's Details</a>
				</div>
				<div class="col-sm-6" style="padding: 5px; text-align: center;">
					<a href="#">View All Product's List</a>
				</div>
			</div>
		</div>
	</section>

<?php
	include("footer.php");

	if (isset($_POST['sub'])) {
		
		$path 	= "user_photo/".basename($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],$path);

		$email2 = $_POST['email2'];
		$ph2 	= $_POST['ph2'];

		$reg2 = "UPDATE signup SET email='$email2', phone2='$ph2', pic='$path' WHERE phone='$u_phn'";
		if (mysqli_query($conn, $reg2)) {
		    
		    echo "<script language=Javascript>document.location.href='preview.php'</script>>";
		    echo "<script> alert('Welcome, You are successfully complete your profile.'); </script>";
		}
	}
?>