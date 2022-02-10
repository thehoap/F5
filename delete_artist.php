<?php
include ('db_connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
$sql1 = "DELETE FROM songs WHERE user_id='$id'";
if ($conn->query($sql) == TRUE && $conn->query($sql1) == TRUE) {
	echo 'Delete Success';
	header("location:manage_artists.php");
} else {
	echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>