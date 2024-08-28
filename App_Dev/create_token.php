<?php
 
require ("config.php");

$sql = "CREATE TABLE token(
        email VARCHAR (250) NOT NULL,
        token VARCHAR (250) NOT NULL,
        expDate DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
      
if (mysqli_query($conn, $sql)) {
  echo "<h3>Table token created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>