<?php 
  include('../../config.php');

  if(isset($_GET['boardId'])
    && isset($_GET['noteId'])
    && isset($_GET['content'])) {

    $boardId = $_GET['boardId'];
    $noteId = $_GET['noteId'];
    $content = $_GET['content'];

    $statement = $db->prepare("UPDATE
      notes,
      boards
    SET
      notes.`content` = '".$content."'
    WHERE 
        boards.`id`=".$boardId."
        AND 
        notes.`id`=".$noteId."");

    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }

    $statement->execute();
    
    $response = 'OK';

    echo json_encode($response);
    
    $statement->close();
  }
?>