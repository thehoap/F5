<?php
include "config.php";
$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT *,stagename FROM songs LEFT JOIN users on songs.user_id=users.id ORDER BY view DESC LIMIT 5');
$songs = $stmt->fetchAll(PDO::FETCH_ASSOC);

//$stmt1 = $pdo->query('SELECT * FROM login LIMIT 5');
$stmt1 = $pdo->query('SELECT * FROM users WHERE type = 3 LIMIT 5');
$artists = $stmt1->fetchAll(PDO::FETCH_ASSOC);

?>