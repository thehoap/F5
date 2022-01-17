<?php 
include 'db_connect.php';
error_reporting(0);
session_start();

if (isset($_SESSION['currUser'])) {
    $id=$_SESSION['currUser'];
}
if (isset($_POST['submit'])){
    
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size']; 
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts =explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png");
    if(in_array($file_ext,$expensions)=== false){
    $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
    if($file_size > 2097152) {
    $errors[]='Kích thước file không được lớn hơn 2MB';
}
    $image = $_FILES['image']['name'];
    $target = "assets/avatar/".basename($image);

    
            $sql = "UPDATE users SET image='$image' WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

            }
            if ($result) {
                echo "<script>alert('Cập nhật thành công.')</script>";
                
                header("Location: index.php");
            
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
}

    
?>
<!DOCTYPE html>
<html lang="en">
    
    <body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" class="form">
             <div class="form-group" >
             <input type="file" name="image" id = "image"> 
            </div>
            <div class="form-group">
                <button name="submit" class="primary-btn">Cập nhật</button>
            </div>
           
           
        </form>
    </body>
</html>
