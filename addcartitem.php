<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$itemId = (int)$obj['itemid'];
$userId = (int)$obj['userid'];
$amount = (int)$obj['amount'];
$price = (float)$obj['price'];

$mysql_qry = "INSERT INTO cart VALUES ('$userId', '$itemId', '$amount', '$price')";

$result = mysqli_query($conn, $mysql_qry);

$conn->close();
?>