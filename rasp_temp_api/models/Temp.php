<?php
class Temp {
  private $conn;
  private $table = 'temps';

  //Properties
  public $id;
  public $temp;
  public $created_at;

  //constructor with DB
  public function __construct($db) {
    $this->conn = $db;
  }

  public function read() {
    //Create query
    $query = 'SELECT
      id,
      temp,
      created_at
    FROM
    ' . $this->table . '
    ORDER BY
      created_at ASC';

      //Prepare statment and Execute
      $stmt = $this->conn->prepare($query);

      $stmt->execute();

      return $stmt;
  }

  public function read_single() {
    //Create query
    $query = 'SELECT
      id,
      temp,
      created_at
    FROM
    ' . $this->table . '
    ORDER BY
      created_at DESC
    LIMIT 0,1';

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id=$row['id'];
    $this->temp=$row['temp'];
    $this->created_at=$row['created_at'];
  }
}
 ?>
