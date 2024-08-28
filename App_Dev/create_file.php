<?php
 
require ("config.php");

$sql = "CREATE TABLE files (
        id INT AUTO_INCREMENT PRIMARY KEY,
        mime VARCHAR (255) NOT NULL,
        data BLOB NOT NULL
        )";
      
if (mysqli_query($conn, $sql)) {
  echo "<h3>Table file created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
