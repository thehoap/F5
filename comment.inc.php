<?php

function setComments($conn) {
    if(isset($_POST['submitComment'])){
        $uid =  $_POST['uid'];
        $audio_id =  $_POST['audio_id'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "INSERT INTO comments (uid, audio_id, date, message) VALUE ('$uid', '$audio_id', '$date', '$message')";
        $result = $conn->query($sql);
        //header("Refresh:0");
    }
}
function getComment($conn,$id){
    $sql = "SELECT *,image,stagename FROM comments LEFT JOIN users on comments.uid=users.id WHERE audio_id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<ul class='comment-bottom'>";
            while($row = $result->fetch_assoc()) {
                echo "<li class='comment'>";
                    echo "<img src=".$_SESSION['avatar'].$row['image']."
                                alt=''
                                class='user-avatar'
                            />";
                    echo "<div class='comment__desc'>";
                        echo "<span class='comment__name user-name'>
                                {$row['stagename']}
                            </span>";
                        echo "<p class='comment__content'>
                                {$row['message']}
                            </p>";
                    echo "</div>";
                echo "</li>";
            }
        echo "</ul>";
    }   
}
function getCommentName($conn){
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "{$row['uid']} <br/>";
        }
    }   
}
function getCommentMessage($conn){
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "{$row['message']} <br/>";
        }
    }   
}
?>