<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="style.css"/>
 <link rel="stylesheet" href="./css/app.css" />
</head>
<body>
<?php
session_start();
include 'db_connect.php';
if(isset($_SESSION['currUser'])){
    $id=$_SESSION['currUser'];
    $sql = "SELECT * FROM users WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $paths=$row['image'];
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>
<form method="POST" class="form">
<h2>Thông tin cá nhân</h2>
<div>
<a href="update_avatar.php">
    <img
                        src="<?='./assets/avatar/'.$_SESSION['path']?>"
                        alt="Avatar"
                        class="user-avatar"
                    /></a><br/>
<label>Name: <input type="text" placeholder="<?php echo $row['stagename']; ?>" name="stagename"></label><br/>

<input type="submit" value="Chỉnh sửa thông tin" name="update_users">
</div>
<?php
if (isset($_POST['update_users'])){

$stagename=$_POST['stagename'];


$query = "UPDATE `users` SET stagename='$stagename' WHERE id='$id'";
if ($conn->query($query) == TRUE) {
echo "Record updated successfully";
header("location:index.php");
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>
</form>
</body>
</html>