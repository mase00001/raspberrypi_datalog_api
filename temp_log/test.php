<?php
$host =  'localhost';
$user = 'root';
$password = 'dankel2202';
$dbname = 'rasp_temp';
// Set DSN
$dsn = 'mysql:host='. $host .';dbname='. $dbname;
// Create a PDO instance
try {
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch(PDOException $e) {
       echo $e->getMessage();
    }


//INSERT DATA
while(True){
   $f = fopen("/sys/class/thermal/thermal_zone0/temp","r");
   $temp = fgets($f)/1000;
   fclose($f);

   $sql = 'INSERT INTO temps(temp) VALUES(:temp)';
   $stmt = $pdo->prepare($sql);
   $stmt->execute(['temp'=>$temp]);
   echo 'Post Added' . '<br>';
   sleep(2.5);
  }

 ?>
