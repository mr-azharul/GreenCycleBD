<?php

	if(isset($_POST['phone2'])) {
	 
		$phn=$_POST['ch_phn'];
		$checkdata="SELECT phone FROM signup WHERE phone='$phn'";
		$query=mysqli_query($conn, $checkdata);

	 	if(mysql_num_rows($query)>0) {
	  		echo "User Name Already Exist";
	 	} else {
	  		echo "OK";
	 	}
	 	exit();
	}
?>