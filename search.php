<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$isCategory = $obj['iscategory'];
$queryId = (int)$isCategory;
$neededInfo = $obj['searchitem'];

if($queryId == 1){
	// 1 - category
	if(strcmp($neededInfo, 'Accessory') == 0){
		//if pressed accessories
		$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews FROM item where category <> 'Monitor' and category <> 'Phone' and category <> 'Laptop' and category <> 'Tablet' and category <> 'Watch' and category <> 'PC' and category <> 'TV' and category <> 'Console'";
	} elseif (strcmp($neededInfo, 'Gaming') == 0) {
		//if pressed gaming
		$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews FROM item where category = 'Console' OR category = 'Controller' OR category = 'VR'";
	} else {
		//search for needed category
		$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews FROM item where category = '$neededInfo'";
	}
} else {
	// search for name
	$mysql_qry = "SELECT ItemID, Image, Name, Rating, Price, Reviews, Category FROM item where name LIKE '%$neededInfo%'";
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