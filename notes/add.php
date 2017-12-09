<?php 
  include('../config.php');

  if(isset($_GET['positionX'])  
    && isset($_GET['positionY']) 
    && isset($_GET['sizeX']) 
    && isset($_GET['sizeY'])
    && isset($_GET['content'])
    && isset($_GET['boardId'])) 
  {
    $positionX = $_GET['positionX'];
    $positionY = $_GET['positionY'];
    $sizeX = $_GET['sizeX'];
    $sizeY = $_GET['sizeY'];
    $content = $_GET['content'];
    $boardId = $_GET['boardId'];

    $statement = $db->prepare("INSERT INTO notes( 
      position_x, 
      position_y, 
      size_x, 
      size_y, 
      content,
      board_id
    ) 
    VALUES (".$positionX.",".$positionY.",".$sizeX.",".$sizeY.",'".$content."',".$boardId.")");
    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }
    $statement->execute();
    $statement->close();

    // Get id of inserted row
    $id = mysqli_insert_id($db);

    $response = array('status' => 'OK', 'id' => $id);

    echo json_encode($response);
  }
?>