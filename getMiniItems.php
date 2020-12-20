<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$neededID = $obj['id'];
$id = (int)$neededID;


if($id < 2){
	$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews FROM item where itemid < 12";
} else {
	$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews FROM item where itemid > 12";
}
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