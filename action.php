<?php
  //ket noi csdl voi mysql bang PDO
  include 'config.php';
  $conn=pdo_connect_mysql();
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];

    $sql = 'SELECT name_songs FROM songs WHERE name_songs LIKE :namesongs LIMIT 5';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['namesongs' => '%' . $inpText . '%']);
   
    $result = $stmt->fetchAll();

    $sql1 = 'SELECT artist FROM songs WHERE artist LIKE :artist LIMIT 5';
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute(['artist' => '%' . $inpText . '%']);
   
    $result1 = $stmt1->fetchAll();

    if ($result) {
      foreach ($result1 as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['artist'] . '</a>';
      }
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['name_songs'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>