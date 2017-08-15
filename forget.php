<?php
	include("header.php");
?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-3" style="padding: 10px; padding-top: 30px;">
				<form class="form-horizontal" action="" method="post">
				  <div class="form-group">
				    <label class="control-label" for="name">Email:</label>
				      <input type="email" class="form-control" placeholder="Enter Your Email Address" required="1" name="email">
				  </div>
				  <div class="form-group" align="right"> 
				      <button type="submit" class="btn btn-default" name="send">Send</button>
				  </div>
				</form>
			</div>
			<div class="col-sm-5"></div>
		</div>
	</div><br><br>

<?php
	include ("footer.php");

	if (isset($_POST['send'])) {
		$forget = $_POST['email'];

		$forget_sql = "SELECT password, email FROM signup WHERE email='$forget'";
		$rs_forget = mysqli_query($conn, $forget_sql);

		if (mysqli_num_rows($rs_forget) > 0) {
		    $row1 = mysqli_fetch_assoc($rs_forget);
		    $your_password = $row1['password'];

		    $subject = "Password Recover";
		    $body = "Your Password Is: ".$your_password;

		    $recipient = $forget;
		    $headers = "From: " . "Admin" . "<" . "Green Cycle Bangladesh" . ">\n";
		    $headers .= "X-Sender: <" . "$forget" . ">\n";
		    $headers .= "Return-Path: <" . "$forget" . ">\n";
		    $headers .= "Error-To: <" . "$forget" . ">\n";
		    $headers .= "Content-Type: text/html\n";
		    @mail($recipient,$subject,$body,$headers);
		    echo "<script> alert('We send your password in your mail Address please check your Inbox, Spam, Trash etc.'); </script>";
		} else {
				echo "<script> alert('Wrong Email Address. Please Confirm your right email.'); </script>";
		}
	}
?>