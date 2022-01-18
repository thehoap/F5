<?php
include "config.php";
$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT *,username FROM songs LEFT JOIN login on songs.user_id=login.id ORDER BY view DESC LIMIT 5');
$songs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt1 = $pdo->query('SELECT * FROM login LIMIT 5');
$artists = $stmt1->fetchAll(PDO::FETCH_ASSOC);

?>