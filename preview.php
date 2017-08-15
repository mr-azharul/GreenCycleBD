<?php
	session_start();
	if(isset($_SESSION['phone2']) == NULL){
		header("Location: signup.php");
	}
	else {
		header( 'Content-Type: text/html; charset=utf-8' );
	}

	include("header.php");

	$u_phn 		= $_SESSION["phone2"];
	$u_name 	= "SELECT * FROM signup WHERE phone='$u_phn'";
	$re_name 	= mysqli_query($conn, $u_name);
	$row_name 	= mysqli_fetch_assoc($re_name);
	$usr_name 	= $row_name['name'];
	$usr_email 	= $row_name['email'];
	$ch_loc 	= $row_name['location_id'];
	$ch_prof 	= $row_name['profession_id'];
	$usr_pic 	= $row_name['pic'];

	$u_loc 		= "SELECT * FROM location WHERE id='$ch_loc'";
	$re_loc 	= mysqli_query($conn, $u_loc);
	$row_loc 	= mysqli_fetch_assoc($re_loc);
	$na_loc 	= $row_loc['name'];
	$pa_loc 	= $row_loc['parent_id'];

	$u_loc1 	= "SELECT * FROM parent_location WHERE id='$pa_loc'";
	$re_loc1 	= mysqli_query($conn, $u_loc1);
	$row_loc1 	= mysqli_fetch_assoc($re_loc1);
	$na_loc1 	= $row_loc1['name'];

	$u_prof 	= "SELECT * FROM category WHERE id='$ch_prof'";
	$re_prof 	= mysqli_query($conn, $u_prof);
	$row_prof 	= mysqli_fetch_assoc($re_prof);
	$na_prof 	= $row_prof['name'];
?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div id="pic-box">
						<div align="right"><img class="profile-pic" src="<?php echo $usr_pic; ?>"></div>
					</div>
					<div id="details">
						<div id="cat"><p><?php echo $na_prof; ?></p></div>
						<div id="cat-det">
							<p>Name 	: <?php echo $usr_name; ?></p>
							<p>Location : <?php echo $na_loc.", ".$na_loc1; ?></p>
							<p>Phone 	: <?php echo $u_phn; ?></p>
							<p>Email 	: <?php echo $usr_email; ?></p>
							<p>About Me : I am a <?php echo $na_prof; ?></p>
						</div>
						<button class="btn btn-default" type="submit" style="float: right;">Edit</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div><br>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div id="buttons">
						<button type="submit" class="btn btn-default disabled">Preview</button>
				        <button type="submit" class="btn btn-default disabled">Submit</button>
				        <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#myModal">Boost Profile</button><span style="color: green"> * Premium</span><br><br>
				        <button type="submit" class="btn btn-default">Share</button>
				        <button type="submit" class="btn btn-default">Download as Visiting Card</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div><br><br>

		<div class="container">
			<div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Boost Your Profile</h4>
			        </div>
			        <div class="modal-body">
			          <p>By boosting your profile, you can promote your profile. And you will our premium client. Your profile will always show on top of the list. And you will enjoy our all other offers free.</p><br>
			          <p>You can boost your profile by send us <b>200 BDT</b> by Bkash</p><br>
			          <p>You have to Bkash on <b>+8801716284883</b></p><br>
			          <p>Your Refarence Number For Bkash is: <b><?php echo $row_name['id'];?></b></p>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
		  </div>
		</div>

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
?>