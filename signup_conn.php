<?php

$username=$_POST['username'];

$email=$_POST['email'];

$password=$_POST['password'];


$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myturf";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	}
else{

	$checkUser = "SELECT * from signup where email='$email'";
	$result=mysqli_query($conn, $checkUser);
	$count = mysqli_num_rows($result);
	if($count > 0){
		echo"User exist";
	}
#check wheather count of user is greater than zero

else{
	$sql="INSERT INTO `signup`(`username`,`email`,`password`)
	values('$username','$email','$password')";
	if ($conn->query($sql)) {
		
    	echo "New record is inserted successfully";	?>
		<br>

		<form align='center' action="../admin/home1.php" ><br><br>
       <button type="submit" value="Submit" clsss="btn"><b> TO GO HOME PAGE</b></button>
		
		<?php

	}
	else{
		echo "Error: ".$sql."<br>".$conn->error;
	}
	$conn->close();
}
}


?>