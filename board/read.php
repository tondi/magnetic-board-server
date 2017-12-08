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
    $statement->close();
    
    // Get all present rows
    $statement = $db->prepare("SELECT
      COUNT(id)
    FROM
        `notes` as nt
    WHERE 
        nt.`board_id`=".$id."");

    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }

    $statement->execute();
    $statement->bind_result($count);
    $statement->fetch();

    $response = array('id' => $id, 'count' => $count);
    
    echo json_encode($response);
    
    $statement->close();
  }
?>