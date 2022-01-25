<?php

function setComments($conn) {
    if(isset($_POST['submitComment'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "INSERT INTO comments (uid, date, message) VALUE ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
        header("Refresh:0");
    }
}
function getComment($conn){
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        echo "<ul class='comment-bottom'>";
            while($row = $result->fetch_assoc()) {
                echo "<li class='comment'>";
                    echo "<img
                                src='./assets/img/andriyko-podilnyk-3p6RZXty-7c-unsplash.jpg'
                                alt=''
                                class='user-avatar'
                            />";
                    echo "<div class='comment__desc'>";
                        echo "<span class='comment__name user-name'>
                                {$row['uid']}
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