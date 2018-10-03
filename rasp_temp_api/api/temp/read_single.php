<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Temp.php';

  //Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate new Temp Object
  $temp_post = new Temp($db);

  $temp_post->read_single();

  $temp_single_arr = array(
    'id' => $temp_post->id,
    'temp' => $temp_post->temp,
    'created_at' => $temp_post->temp,
  );

  echo json_encode($temp_single_arr);

?>
