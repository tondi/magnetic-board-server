<?php 
  include('../../config.php');

  if(isset($_GET['boardId'])
    && isset($_GET['noteId'])
    && isset($_GET['sizeX'])
    && isset($_GET['sizeY'])) {

    $boardId = $_GET['boardId'];
    $noteId = $_GET['noteId'];
    $sizeX = $_GET['sizeX'];
    $sizeY = $_GET['sizeY'];

    $statement = $db->prepare("UPDATE
      notes,
      boards
    SET
      notes.`size_x` = ".$sizeX.",
      notes.`size_y` = ".$sizeY."
    WHERE 
        boards.`id`=".$boardId." 
        AND 
        notes.`id`=".$noteId."");

    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }

    $statement->execute();
    // $statement->bind_result($id, $position_x, $position_y, $size_x, $size_y, $content, $updated_at);
    
    // $response = array();
    
    // for ($i = 0; $statement->fetch(); ++$i) {
    //   $position = array('x' => $position_x, 'y' => $position_y);
    //   $size = array('x' => $size_x, 'y' => $size_y);
    
    //   $response[$i] = array(
    //       'id' => $id, 
    //       'position' => $position, 
    //       'size' => $size, 
    //       'content' => $content
    //     );
    // }
    // temp
    $response = 'OK';

    echo json_encode($response);
    
    $statement->close();
  }
?>