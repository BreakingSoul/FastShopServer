<?php
require "conn.php";
$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$mysql_qry = "insert into account (Email, Password, Name, Surname) values ('$email', '$password', '$name', '$surname')";

if ($conn->query($mysql_qry) === TRUE) {
	echo "Thanks for Registration!";
} else {
	echo "Error: " . $mysql_qry . "<br>" . $conn->error;
}
$conn->close();
?>