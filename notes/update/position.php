<?php 
  include('../../config.php');

  if(isset($_GET['boardId'])
    && isset($_GET['noteId'])
    && isset($_GET['positionX'])
    && isset($_GET['positionY'])) {

    $boardId = $_GET['boardId'];
    $noteId = $_GET['noteId'];
    $positionX = $_GET['positionX'];
    $positionY = $_GET['positionY'];

    $statement = $db->prepare("UPDATE
      notes,
      boards
    SET
      notes.`position_x` = ".$positionX.",
      notes.`position_y` = ".$positionY."
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