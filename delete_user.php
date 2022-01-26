<?php
include ('db_connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
if ($conn->query($sql) == TRUE) {
	echo 'Delete Success';
	header("location:manage_users.php");
} else {
	echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>