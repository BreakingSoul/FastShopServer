<?php
require "conn.php";

//$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews FROM item WHERE ItemID > 10";
$neededInfo = "iPho";
$mysql_qry = "SELECT Name FROM item where name LIKE '%$neededInfo%'";
$result = mysqli_query($conn, $mysql_qry);

if(mysqli_num_rows($result) > 0){
	#echo "Logged in Successfully!";
	while($row = $result->fetch_assoc()) {
        $array[] = $row;
	//	echo $row["ItemID"];
    }
}
else {
	echo "No data!";
}	
	header('Content-Type:Application/json');
	echo json_encode($array);


$conn->close();
?>