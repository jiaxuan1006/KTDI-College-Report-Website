<?php
 
require ("config.php");

$sql = "CREATE TABLE image (
    id int(11) NOT NULL AUTO_INCREMENT,
    file_name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    imageData BLOB NOT NULL,
    userID VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
      
if (mysqli_query($conn, $sql)) {
  echo "<h3>Table image created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
