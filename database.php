<?php

$servername = "localhost";
$username = "root";
$password = "290698";
$dbname = "demo";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo 'Connected successfully!';

// $sql = "INSERT INTO customer (`id`, `name`, `phone`, `address`) values (1, 'Nguyen Van A', '0970 306 603', '69 le van hien')";


// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

?>