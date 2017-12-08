<?php 
  include('../config.php');

  if(isset($_GET['boardId'])
    && isset($_GET['noteId'])) {

    $boardId = $_GET['boardId'];
    $noteId = $_GET['noteId'];

    $statement = $db->prepare("UPDATE
      notes,
      boards
    SET
      notes.`is_hidden` = 1
    WHERE 
        boards.`id`=".$boardId."
        AND 
        notes.`id`=".$noteId."");

    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }

    $statement->execute();
    
    $response = array('status' => 'OK');

    echo json_encode($response);
    
    $statement->close();
  }
?>