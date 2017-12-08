<?php 
  include('../config.php');

  if(isset($_GET['name'])) {
    $name = $_GET['name'];
    
    $statement = $db->prepare("SELECT
      b.id
    FROM
        `boards` as b
    WHERE 
        b.`name`='".$name."'");

    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }

    $statement->execute();
    $statement->bind_result($id);
    $statement->fetch();

    $response = array('id' => $id);
    
    echo json_encode($response);
    
    $statement->close();
  }
?>