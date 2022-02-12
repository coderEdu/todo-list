<?php 
if ($_GET) {
	$id = $_GET['id'];
	include_once "db.php";
	mysqli_query($conn,"DELETE FROM list WHERE id = '$id'");
	header("Location: index.php");
}
?>