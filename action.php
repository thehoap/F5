<?php
  //ket noi csdl voi mysql bang PDO
  include 'config.php';
  $conn=pdo_connect_mysql();
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];

    $sql = 'SELECT title FROM songs WHERE title LIKE :title LIMIT 5';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['title' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql1 = 'SELECT stagename FROM users WHERE stagename LIKE :stagename AND type = 3 LIMIT 5';
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute(['stagename' => '%' . $inpText . '%']);
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

  if ($result or $result1) {
      foreach ($result1 as $row) {
        echo '<a href ="search.php?name='.$row['stagename'].' " class = "list">' . $row['stagename'] . '</a>';
      }
      foreach ($result as $row) {
        echo '<a href="search.php?name='.$row['title'].' " class = "list">' . $row['title'] . '</a>';
      }
  } else {
      echo '<p class ="list2">No Record</p>';
  }
}
?>