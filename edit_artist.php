<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
include 'db_connect.php';
$id=$_GET['id'];
$sql = "SELECT * FROM users where id='$id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result)
?>
<form method="POST" class="form">
<h2>Edit Artist</h2>
<label>Nghệ Danh: <input type="text" value="<?php echo $row['stagename']; ?>" name="stagename"></label><br/>
<label>Thể Loại: <input type="text" value="<?php echo $row['occupation']; ?>" name="occupation"></label><br/>
<input type="submit" value="Update" name="update_artist">
<?php
if (isset($_POST['update_artist'])){
$id=$_GET['id'];
$stagename=$_POST['stagename'];
$occupation=$_POST['occupation'];

$query = "UPDATE `users` SET stagename='$stagename', occupation='$occupation' WHERE id='$id'";
if ($conn->query($query) == TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>
</form>
</body>
</html>