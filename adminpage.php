<table border="1">
<tr>
<td>audio_id</td>
<td>user_id</td>
<td>title</td>
<td>category</td>
<td>thumbnail</td>
<td>audio_location</td>
</tr>

<?php
include 'db_connect.php';
$sql = "SELECT * FROM songs";
$result = mysqli_query($conn, $sql);

while($row=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $row['audio_id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['thumbnail']; ?></td>
<td><?php echo $row['audio_location']; ?></td>

<td><a href="edit_song.php?audio_id=<?php echo $row['audio_id']; ?>">Edit</a></td>
<td><a href="delete_song.php?audio_id=<?php echo $row['audio_id']; ?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
