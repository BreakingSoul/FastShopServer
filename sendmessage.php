<?php
require "conn.php";

//$json = $_GET["json"];
$DATA_JSON = file_get_contents("php://input");
$obj = json_decode($DATA_JSON, true);
$userId = (int)$obj['userid'];
$toSupport = (int)$obj['tosupport'];
$message = $obj['message'];

$mysql_qry = "INSERT INTO support_message (AccountID, ToSupport, Message) VALUES ('$userId', '$toSupport', '$message')";

$result = mysqli_query($conn, $mysql_qry);

$conn->close();
?>