<?php
 
require ("config.php"); 


$sql = "CREATE TABLE user(
        id varchar(10) PRIMARY KEY,
        name varchar(50),
        gender varchar(10) ,
        contact varchar(15) ,
        email varchar(250),
        username varchar(12),
        password varchar(12),
        level int(3)
        )";

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table user created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>