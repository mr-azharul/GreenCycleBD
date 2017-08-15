<?php
	include("header.php");
?>

		<div class="container-fluid">
			<div class="row">
				<h3 align="center">Please Type All Information About You</h3>
				<p align="center">All Red Star Fields (<span style="color: red"> * </span>) Is Required.</p>
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="container">
				  	    <form class="form-horizontal" action="" method="post">
						  <div class="form-group">
						    <label class="control-label col-sm-1" style="text-align: left;"><span style="color: red;">*</span>Name:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" placeholder="Type Your Name" name="name" required="1">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-1" style="text-align: left;"><span style="color: red">*</span>Phone:</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" name="phone2" id="phone2" placeholder="Type Your Phone Number" required="1">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-1" style="text-align: left;"><span style="color: red">*</span>Password:</label>
						    <div class="col-sm-4"> 
						      <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-1" style="text-align: left;"><span style="color: red">*</span>Password:</label>
						    <div class="col-sm-4"> 
						      <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Confirm Password">
						      <span id='message'></span>
						    </div>
						  </div>
						  <div class="form-group"">
						  	<label class="control-label col-sm-1" for="profession" style="text-align: left;"><span style="color: red">*</span>Location:</label>
							  <div class="col-sm-4">
								  <select class="form-control" name="location" required>
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
				    	  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-1" for="profession" style="text-align: left;"><span style="color: red">*</span>Profession:</label>
						    <div class="col-sm-4">
						      <select class="form-control" name="profession" required>
							   <option value="" disabled selected>Select Profession</option>
							   <?php
									$sql_select = "select * from category order by name";
									$rs = mysqli_query($conn, $sql_select); 
									while($row1=mysqli_fetch_assoc($rs)){  
										echo "<option value='$row1[id]'>$row1[name]</option>"; 
									}
								?>
							 </select>
						    </div>
						  </div>
						  <div class="form-group"> 
						    <div class="col-sm-offset-1 col-sm-4">
						      <button type="submit" class="btn btn-default" name="next">Next</button>
						    </div>
						  </div>
						</form>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<?php
				if (isset($_POST['next'])) {
		
					$name = $_POST['name'];
					$phone2 = $_POST['phone2'];
					$pwd = $_POST['pwd'];
					$pwd2= $_POST['pwd2'];
					$loc = $_POST['location'];
					$prof = $_POST['profession'];

					$checkphn = "SELECT * FROM signup WHERE phone='$phone2'";
					$phn_query = mysqli_query($conn, $checkphn);

				 	if(mysqli_num_rows($phn_query)>0) {
				  		echo "<p style='color: red; text-align: center; padding: 5px; font-size: 16px; font-weight: 600;'>Phone Number Already Exists</p>";
				 	} else {
				  		if($pwd == $pwd2) {
							$reg = "INSERT INTO signup (name, phone, password, location_id, profession_id) VALUES ('$name', '$phone2', '$pwd2','$loc', '$prof')";
							if (mysqli_query($conn, $reg)) {
							    session_start();
								$_SESSION["phone2"] = $phone2;
							    echo "<script language=Javascript>document.location.href='signup2.php'</script>";
							}
						} else {
							echo "<p style='color: red; text-align: center; padding: 5px; font-size: 16px; font-weight: 600;'>Password Not Matched</p>";
						}
				 	}
				}
			?>
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
	include('footer.php');
?>