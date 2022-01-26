<?php
include ('db_connect.php');
if(isset($_REQUEST['audio_id']) and $_REQUEST['audio_id']!=""){
$audio_id=$_GET['audio_id'];
$sql = "DELETE FROM songs WHERE audio_id='$audio_id'";
if ($conn->query($sql) == TRUE) {
header("location:manage_songs.php");
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>