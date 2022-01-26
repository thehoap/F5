<?php 
include "config.php";

if (isset($_POST['how'])){
    $user_id = $_SESSION['currUser'];
    $audio_id = $_POST['data'];
    $pdo = pdo_connect_mysql();
    $query = "SELECT * FROM likes WHERE user_id = :user_id AND audio_id = :audio_id";
    $statement = $pdo->prepare($query);
    $statement->execute(
        array(
                'user_id' => $user_id,
                'audio_id' => $audio_id
            )
            );
    $like = $statement->fetch(PDO::FETCH_ASSOC);
    if ($like){
        $stmt = $pdo->prepare('DELETE FROM likes WHERE id = ?');
        $stmt->execute([ $like['id']]);
    }
    else{
        $stmt = $pdo->prepare('INSERT INTO likes (user_id, audio_id) VALUES (?, ?)');
        $stmt->execute([ $user_id, $audio_id ]);
    }

}
?>