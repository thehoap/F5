<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// Kết nối Database
include 'db_connect.php';
$audio_id=$_GET['audio_id'];
$sql = "SELECT * FROM songs where audio_id='$audio_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result)
?>
<form method="POST" class="form">
<h2>Edit song</h2>
<label>Title: <input type="text" value="<?php echo $row['title']; ?>" name="title"></label><br/>
<label>Category: <input type="text" value="<?php echo $row['category']; ?>" name="category"></label><br/>
<label>Thumbnail: <input type="text" value="<?php echo $row['thumbnail']; ?>" name="thumbnail"></label><br/>
<label>Audio_location: <input type="text" value="<?php echo $row['audio_location']; ?>" name="audio_location"></label><br/>
<input type="submit" value="Update" name="update_song">
<?php
if (isset($_POST['update_song'])){
$audio_id=$_GET['audio_id'];
$title=$_POST['title'];
$category=$_POST['category'];
$thumbnail=$_POST['thumbnail'];
$audio_location=$_POST['audio_location'];

$query = "UPDATE `songs` SET title='$title', category='$category', thumbnail='$thumbnail', audio_location='$audio_location' WHERE audio_id='$audio_id'";
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
