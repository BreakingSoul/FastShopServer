<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$userId = (int)$obj['userid'];
$itemId = (int)$obj['itemid'];

$mysql_qry = "INSERT INTO wish_list VALUES ('$userId', '$itemId')";

$result = mysqli_query($conn, $mysql_qry);

$conn->close();
?>