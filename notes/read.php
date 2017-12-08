<?php 
  include('../config.php');

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $statement = $db->prepare("SELECT
      nt.id,
      nt.position_x,
      nt.position_y,
      nt.size_x,
      nt.size_y,
      nt.content,
      nt.updated_at
    FROM
        `notes` as nt, 
        `boards` as b
    WHERE 
        b.`id`=".$id." 
        AND 
        nt.`board_id`=b.`id`
    ORDER BY
    nt.`updated_at` ASC");

    if (!$statement) {
      echo 'Error during equery execution';
      exit;
    }

    $statement->execute();
    $statement->bind_result($id, $position_x, $position_y, $size_x, $size_y, $content, $updated_at);
    
    $response = array();
    
    for ($i = 0; $statement->fetch(); ++$i) {
      $position = array('x' => $position_x, 'y' => $position_y);
      $size = array('x' => $size_x, 'y' => $size_y);
    
      $response[$i] = array(
          'id' => $id, 
          'position' => $position, 
          'size' => $size, 
          'content' => $content
        );
    }
    // temp
    // $response = array($one, $one);

    echo json_encode($response);
    
    $statement->close();
  }
?>