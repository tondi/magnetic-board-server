<?php

  ini_set('display_errors', -1);

  $server_name = "/magnetic-board-server";

  $db_address = '127.0.0.1';
  $db_name = 'magneticboard';
  $db_username = 'user';
  $db_password = 'q1w2E#';

  $db = new mysqli($db_address, $db_username, $db_password, $db_name);
  if($db->connect_errno) {
      echo 'Error connecting to db';
      exit;
  }

  mysqli_set_charset($db, "utf8");

  header('Access-Control-Allow-Origin: *');  
  
  // function response($status,$status_message,$data)
  // {
  //   header("HTTP/1.1 ".$status);
    
  //   $response['status']=$status;
  //   $response['status_message']=$status_message;
  //   $response['data']=$data;
    
  //   $json_response = json_encode($response);
  //   echo $json_response;
  // }
?>