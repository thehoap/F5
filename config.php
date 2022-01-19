<?php
session_start();
$_SESSION["links_pictures"] = "./assets/img/songs/";
$_SESSION["links_songs"] ="./assets/music/songs/";
$_SESSION["avatar"] ="./assets/avatar/";
function pdo_connect_mysql() {
    // Update the details below with your MySQL details.
    $DATABASE_HOST = '127.0.0.1:3307';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'music_db';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        echo "Connected successfully";
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
  }

function check_artist($a,$list){
    $z=0;
    for ($i = 0; $i < count($list); $i++):
        if($a==$list[$i]['user_id']){
            $z=1;
            break;
        }
    endfor;
    return $z;
} 

?>