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

  //Temp query
  $result = $temp_post->read();


  $num = $result->rowCount();

  if($num > 0) {

  $temp_arr = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $temp_item = array(
      'id' => $id,
      'temp' => $temp,
      'created_at' => $created_at
    );

    array_push($temp_arr, $temp_item);
  }
    echo json_encode($temp_arr);
  } else {
  //No data
  echo json_encode(
    array('message' => 'No data found')
  );
  }
 ?>
