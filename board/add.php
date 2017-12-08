<?php 
  include('../config.php');

  if(isset($_GET['name'])) {
    $name = $_GET['name'];
    

    $statement = $db->prepare("INSERT INTO boards (name) 
      VALUES ('".$name."')");


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