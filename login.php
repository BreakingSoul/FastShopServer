<?php
require "conn.php";

$email = $_POST["email"];
$password = $_POST["password"];
$mysql_qry = "SELECT AccountID FROM Account WHERE Email LIKE '$email' AND Password LIKE '$password'";
$result = mysqli_query($conn, $mysql_qry);

if(mysqli_num_rows($result) > 0){
	#echo "Logged in Successfully!";
	while($row = $result->fetch_assoc()) {
        echo $row["AccountID"];
    }
}
else {
	echo "Login not successful!";
}

$conn->close();
?>