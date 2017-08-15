<?php	
	$host = "localhost";
	$user = "root";
	$pass = "mysql";
	$dbname= "greencyc_greenus3";
	
	$conn = mysqli_connect($host, $user, $pass, $dbname);

	/*if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully". "<br>";

	$sql = "SELECT id, name FROM parent_location";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);*/
?>

<?php	
	/*$host = "localhost";
	$user="greencyc_useg3";
	$pass="BMewZt+5yu,C";
	$dbname="greencyc_greenus3";
	
	$conn = mysql_connect($host,$user,$pass);
	mysql_select_db($dbname,$conn);
	*/
?>