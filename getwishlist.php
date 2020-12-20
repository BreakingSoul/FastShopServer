<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$userID = (int)$obj['userid'];

$mysql_qry = "SELECT DISTINCT I.ItemID, I.Image, I.Name, I.Rating, I.Price, I.Reviews FROM WISH_LIST W INNER JOIN ITEM I ON W.ItemID = I.ItemID AND W.AccountID = '$userID'";

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