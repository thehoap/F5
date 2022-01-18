<?php
include "config.php";
$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT category,thumbnail FROM songs GROUP BY category LIMIT 5');
$categorys = $stmt->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["num"]= "Top" ;

$stmt1 = $pdo->query('SELECT * FROM songs ORDER BY view DESC LIMIT 1');
$views = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>