<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$itemId = (int)$obj['itemid'];
$userId = (int)$obj['userid'];

$mysql_qry = "DELETE FROM cart where AccountID = '$userId' AND ItemID = '$itemId'";

$result = mysqli_query($conn, $mysql_qry);

$conn->close();
?>